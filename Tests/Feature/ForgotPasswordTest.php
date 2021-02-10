<?php

namespace Modules\LU\Tests\Feature;

//use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Modules\LU\Models\User;
use Modules\LU\Notifications\ResetPassword;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase {
    //use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        URL::defaults(['lang' => 'it']);
    }

    protected function passwordRequestRoute() {
        return route('password.request');
    }

    protected function passwordEmailGetRoute() {
        return route('password.email');
    }

    protected function passwordEmailPostRoute() {
        return route('password.email');
    }

    public function testUserCanViewAnEmailPasswordForm() {
        $url = $this->passwordRequestRoute();

        $response = $this->get($url);

        $response->assertSuccessful();
        $response->assertViewIs('pub_theme::auth.passwords.email');
    }

    /* secondo me e' NON puo
    public function testUserCanViewAnEmailPasswordFormWhenAuthenticated() {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get($this->passwordRequestRoute());


        $response->assertSuccessful();
        $response->assertViewIs('auth.passwords.email');
    }
    */
    ///* email da settare in .env
    public function testUserReceivesAnEmailWithAPasswordResetLink() {
        Notification::fake();
        /*
        $user = User::factory()->create([
            'email' => 'john@example.com',
        ]);
        */
        $user = User::inRandomOrder()->first();

        $response = $this->post($this->passwordEmailPostRoute(), [
            'email' => $user->email,
        ]);
        //dd(get_class_methods($user));
        $token = $user->getRememberToken();
        //dd(['email' => $user->email, 'token' => $token]);
        //$this->assertNotNull($token = DB::table('password_resets')->first());
        /*
        Notification::assertSentTo(
            $user,
            ResetPassword::class,
            function ($notification, $channels) use ($token) {
                dd($notification);

                return true === Hash::check($notification->token, $token->token);
            }
        );
        */
        Notification::assertSentTo($user, ResetPassword::class);
    }

    //*/

    public function testUserDoesNotReceiveEmailWhenNotRegistered() {
        Notification::fake();

        $response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), [
            'email' => 'nobody@example.com',
        ]);

        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
        Notification::assertNotSentTo(User::factory()->make(['email' => 'nobody@example.com']), ResetPassword::class);
    }

    public function testEmailIsRequired() {
        $response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), []);

        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
    }

    public function testEmailIsAValidEmail() {
        $response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), [
            'email' => 'invalid-email',
        ]);

        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
    }
}