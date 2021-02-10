<?php


namespace Modules\LU\Tests\Feature;

use Tests\TestCase;
use Modules\LU\Models\User;
//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;

class ForgotPasswordTest extends TestCase{
    //use RefreshDatabase;

    protected function passwordRequestRoute()
    {
        return route('password.request');
    }

    protected function passwordEmailGetRoute()
    {
        return route('password.email');
    }

    protected function passwordEmailPostRoute()
    {
        return route('password.email');
    }

    public function testUserCanViewAnEmailPasswordForm()
    {
        URL::defaults(['lang' => 'it']);
        $response = $this->get($this->passwordRequestRoute());

        $response->assertSuccessful();
        $response->assertViewIs('pub_theme::auth.passwords.email');
    }

    /* secondo me e' NON puo
    public function testUserCanViewAnEmailPasswordFormWhenAuthenticated() {
        URL::defaults(['lang' => 'it']);
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get($this->passwordRequestRoute());


        $response->assertSuccessful();
        $response->assertViewIs('auth.passwords.email');
    }
    */
    /* email da settare in .env
    public function testUserReceivesAnEmailWithAPasswordResetLink() {
        URL::defaults(['lang' => 'it']);
        Notification::fake();
        $user = User::factory()->create([
            'email' => 'john@example.com',
        ]);

        $response = $this->post($this->passwordEmailPostRoute(), [
            'email' => 'john@example.com',
        ]);

        $this->assertNotNull($token = DB::table('password_resets')->first());
        Notification::assertSentTo($user, ResetPassword::class, function ($notification, $channels) use ($token) {
            return Hash::check($notification->token, $token->token) === true;
        });
    }
    */

    public function testUserDoesNotReceiveEmailWhenNotRegistered() {
        URL::defaults(['lang' => 'it']);
        Notification::fake();

        $response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), [
            'email' => 'nobody@example.com',
        ]);

        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
        Notification::assertNotSentTo(User::factory()->make(['email' => 'nobody@example.com']), ResetPassword::class);
    }

    public function testEmailIsRequired()    {
        URL::defaults(['lang' => 'it']);
        $response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), []);

        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
    }

    public function testEmailIsAValidEmail()    {
        URL::defaults(['lang' => 'it']);
        $response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), [
            'email' => 'invalid-email',
        ]);

        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
    }
}
