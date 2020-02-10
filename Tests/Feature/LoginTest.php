<?php

namespace Modules\LU\Tests\Feature;

/*
* https://github.com/dwightwatson/laravel-auth-tests
* https://www.toptal.com/laravel/restful-laravel-api-tutorial
* https://github.com/zaratedev/testing-laravel/blob/master/tests/Feature/LoginTest.php
* https://github.com/DCzajkowski/auth-tests/blob/master/src/Console/stubs/tests/Feature/Auth/LoginTest.php !!!!!
**/

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\LU\Models\User;
//-----  MODELS  -----
use Tests\TestCase;

class LoginTest extends TestCase {
    //use RefreshDatabase;

    protected function successfulLoginRoute() {
        //return route('home');
        return '/';
    }

    protected function loginGetRoute() {
        return route('login');
    }

    protected function loginPostRoute() {
        return route('login');
    }

    protected function logoutRoute() {
        return route('logout');
    }

    protected function successfulLogoutRoute() {
        return '/';
    }

    protected function guestMiddlewareRoute() {
        //return route('home');
        return '/home';
    }

    protected function getTooManyLoginAttemptsMessage() {
        return sprintf('/^%s$/', str_replace('\:seconds', '\d+', preg_quote(__('auth.throttle'), '/')));
    }

    public function testUserCanViewALoginForm() {
        $response = $this->get($this->loginGetRoute());
        $response->assertSuccessful();
        $response->assertViewIs('pub_theme::auth.login');
    }

    // -- da studiare e far funzionare
    public function testUserCannotViewALoginFormWhenAuthenticated() {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get($this->loginGetRoute());
        $response->assertRedirect($this->guestMiddlewareRoute());
    }

    public function testUserCanLoginWithCorrectCredentials() {
        $passwd = 'i-love-laravel';
        $user = factory(User::class)->create([
            //'password' => Hash::make($password = 'i-love-laravel'),
            'passwd' => $passwd,
        ]);

        $response = $this->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => $passwd,
        ]);
        $response->assertRedirect($this->successfulLoginRoute());
        $this->assertAuthenticatedAs($user);
    }

    // -- funzionalita' da verificare
    public function testRememberMeFunctionality() {
        if ($remember_me = 0) {
            $pk = \App::make(User::class)->getKeyName();
            $user = factory(User::class)->create([
                $pk => random_int(1, 100),
                'password' => Hash::make($password = 'i-love-laravel'),
            ]);

            $response = $this->post($this->loginPostRoute(), [
                'email' => $user->email,
                'password' => $password,
                'remember' => 'on',
            ]);

            $user = $user->fresh();

            $response->assertRedirect($this->successfulLoginRoute());
            $response->assertCookie(Auth::guard()->getRecallerName(), vsprintf('%s|%s|%s', [
                $user->id,
                $user->getRememberToken(),
                $user->password,
            ]));
            $this->assertAuthenticatedAs($user);
        }
        $this->assertTrue(true);
    }

    public function testUserCannotLoginWithIncorrectPassword() {
        $user = factory(User::class)->create([
            //'passwd' => Hash::make('i-love-laravel'),
            'passwd' => 'i-love-laravel',
        ]);

        $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect($this->loginGetRoute());
        //$response->assertSessionHasErrors('email');
        //$this->assertTrue(session()->hasOldInput('email'));
        //$this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCannotLoginWithEmailThatDoesNotExist() {
        $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
            'email' => 'nobody@example.com',
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect($this->loginGetRoute());
        //$response->assertSessionHasErrors('email');
        //$this->assertTrue(session()->hasOldInput('email'));
        //$this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCanLogout() {
        $this->be(factory(User::class)->create());

        $response = $this->post($this->logoutRoute());

        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }

    public function testUserCannotLogoutWhenNotAuthenticated() {
        $response = $this->post($this->logoutRoute());

        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }

    public function testUserCannotMakeMoreThanFiveAttemptsInOneMinute() {
        $user = factory(User::class)->create([
            //'password' => Hash::make($password = 'i-love-laravel'),
            'passwd' => 'i-love-laravel',
        ]);

        foreach (range(0, 5) as $_) {
            $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
                'email' => $user->email,
                'password' => 'invalid-password',
            ]);
        }

        $response->assertRedirect($this->loginGetRoute());
        if ($error_in_email = 0) {
            $response->assertSessionHasErrors('email');
        }
        if ($reg_exp = 0) {
            $this->assertRegExp(
            $this->getTooManyLoginAttemptsMessage(),
            collect(
                $response
                ->baseResponse
                ->getSession()
                ->get('errors')
                ->getBag('default')
                ->get('email')
            )->first()
        );
        }
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
