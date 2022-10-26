<?php

declare(strict_types=1);
/**
 * https://raw.githubusercontent.com/DCzajkowski/auth-tests/master/src/Console/stubs/tests/Feature/Auth/ResetPasswordTest.php.
 */

namespace Modules\LU\Tests\Feature;

// use Illuminate\Auth\Events\PasswordReset;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\URL;
use Modules\LU\Events\PasswordReset;
use Modules\LU\Models\User;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
    // use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        URL::defaults(['lang' => 'it']);
    }

    protected function getValidToken($user)
    {
        return Password::broker()->createToken($user);
    }

    protected function getInvalidToken()
    {
        return 'invalid-token';
    }

    protected function passwordResetGetRoute($token)
    {
        return route('password.reset', $token);
    }

    protected function passwordResetPostRoute()
    {
        return route('password.update');
    }

    protected function successfulPasswordResetRoute()
    {
        return route('home');
    }

    public function testUserCanViewAPasswordResetForm()
    {
        // $user = User::factory()->create();
        $user = User::inRandomOrder()->first();
        $token = $this->getValidToken($user);
        $url = $this->passwordResetGetRoute($token);

        $response = $this->get($url);

        $response->assertSuccessful();
        $response->assertViewIs('pub_theme::auth.passwords.reset');
        // $response->assertViewHas('token', $token); ??
    }

    public function testUserCanViewAPasswordResetFormWhenAuthenticated()
    {
        // $user = User::factory()->create();
        $user = User::inRandomOrder()->first();
        $token = $this->getValidToken($user);
        $url = $this->passwordResetGetRoute($token);

        $response = $this->actingAs($user)->get($url);
        /*
        $response->assertSuccessful();
        $response->assertViewIs('auth.passwords.reset');
        $response->assertViewHas('token', $token);
        */
        $response->assertStatus(302);
    }

    public function testUserCanResetPasswordWithValidToken()
    {
        Event::fake();

        // $user = User::factory()->create();
        $user = User::inRandomOrder()->first();
        $url = $this->passwordResetPostRoute();

        $response = $this->post(
            $url,
            [
                'token' => $this->getValidToken($user),
                'email' => $user->email,
                'password' => 'new-awesome-password',
                'password_confirmation' => 'new-awesome-password',
            ]
        );

        // $url = $this->successfulPasswordResetRoute();
        // $response->assertRedirect($url);

        // $this->assertEquals($user->email, $user->fresh()->email);
        // $this->assertTrue(Hash::check('new-awesome-password', $user->fresh()->password));
        $this->assertAuthenticatedAs($user);
        // Event::assertDispatched(PasswordReset::class, function ($e) use ($user) {
        //    return $e->user->getKey() === $user->getKey();
        // });
    }

    public function testUserCannotResetPasswordWithInvalidToken()
    {
        $user = User::factory()->create(
            [
                'password' => Hash::make('old-password'),
            ]
        );
        $token = $this->getInvalidToken();
        $url = $this->passwordResetGetRoute($token);

        $response = $this->from($url)
            ->post(
                $this->passwordResetPostRoute(),
                [
                    'token' => $this->getInvalidToken(),
                    'email' => $user->email,
                    'password' => 'new-awesome-password',
                    'password_confirmation' => 'new-awesome-password',
                ]
            );

        $response->assertRedirect($url);
        static::assertSame($user->email, $user->fresh()->email);
        // $this->assertTrue(Hash::check('old-password', $user->fresh()->password));
        $this->assertGuest();
    }

    public function testUserCannotResetPasswordWithoutProvidingANewPassword()
    {
        $user = User::factory()->create(
            [
                'password' => Hash::make('old-password'),
            ]
        );

        $response = $this->from($this->passwordResetGetRoute($token = $this->getValidToken($user)))->post(
            $this->passwordResetPostRoute(),
            [
                'token' => $token,
                'email' => $user->email,
                'password' => '',
                'password_confirmation' => '',
            ]
        );

        $response->assertRedirect($this->passwordResetGetRoute($token));
        $response->assertSessionHasErrors('password');
        static::assertTrue(session()->hasOldInput('email'));
        static::assertFalse(session()->hasOldInput('password'));
        static::assertSame($user->email, $user->fresh()->email);
        // $this->assertTrue(Hash::check('old-password', $user->fresh()->password));
        $this->assertGuest();
    }

    public function testUserCannotResetPasswordWithoutProvidingAnEmail()
    {
        $user = User::factory()->create(
            [
                'password' => Hash::make('old-password'),
            ]
        );

        $response = $this->from($this->passwordResetGetRoute($token = $this->getValidToken($user)))->post(
            $this->passwordResetPostRoute(),
            [
                'token' => $token,
                'email' => '',
                'password' => 'new-awesome-password',
                'password_confirmation' => 'new-awesome-password',
            ]
        );

        $response->assertRedirect($this->passwordResetGetRoute($token));
        $response->assertSessionHasErrors('email');
        static::assertFalse(session()->hasOldInput('password'));
        static::assertSame($user->email, $user->fresh()->email);
        // $this->assertTrue(Hash::check('old-password', $user->fresh()->password));
        $this->assertGuest();
    }
}
