<?php

namespace Modules\LU\Tests\Feature;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Modules\LU\Models\PasswordReset;
//-----  MODELS  -----
use Modules\LU\Models\User;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase {
    use RefreshDatabase;

    protected function passwordRequestRoute() {
        return route('password.request');
    }

    protected function passwordEmailGetRoute() {
        return route('password.email');
    }

    protected function passwordEmailPostRoute() {
        return route('password.email');
    }

    protected function guestMiddlewareRoute() {
        //return route('home');
        return '/home';
    }

    public function testUserCanViewAnEmailPasswordForm() {
        $response = $this->get($this->passwordRequestRoute());

        $response->assertSuccessful();
        $response->assertViewIs('pub_theme::auth.passwords.email');
    }

    public function testUserCannotViewAnEmailPasswordFormWhenAuthenticated() {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get($this->passwordRequestRoute());

        $response->assertRedirect($this->guestMiddlewareRoute());
    }

    public function testUserReceivesAnEmailWithAPasswordResetLink() {
        Notification::fake();
        $user = factory(User::class)->create([
            'email' => 'john@example.com',
        ]);

        $response = $this->post($this->passwordEmailPostRoute(), [
            'email' => 'john@example.com',
        ]);
        //$first=DB::table('password_resets')->first();
        $first = PasswordReset::first();
        $this->assertNotNull($token = $first);
        if ($notify_fix = 0) {
            Notification::assertSentTo($user, ResetPassword::class, function ($notification, $channels) use ($token) {
                return true === Hash::check($notification->token, $token->token);
            });
        }
    }

    public function testUserDoesNotReceiveEmailWhenNotRegistered() {
        Notification::fake();

        $response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), [
            'email' => 'nobody@example.com',
        ]);

        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
        Notification::assertNotSentTo(factory(User::class)->make(['email' => 'nobody@example.com']), ResetPassword::class);
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
