<?php
/**
 * https://medium.com/@DCzajkowski/testing-laravel-authentication-flow-573ea0a96318.
  * https://laravel-news.com/test-views-with-laravel-mojito
  * https://github.com/dczajkowski/auth-tests.
 */

namespace Modules\LU\Tests\Feature;

use Illuminate\Support\Facades\Auth;
//URL::defaults(['locale' => $request->user()->locale]);
//\URL::forceRootUrl('http://www.myapp.com/en');

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Modules\LU\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase {
    public function setUp(): void {
        parent::setUp();
        URL::defaults(['lang' => 'it']);
    }

    /*
    public function setUp(): void{
        URL::defaults(['lang' => 'it' ]);
        parent::setUp();
    }
    */
    protected function successfulLoginRoute() {
        return route('home');
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
        return route('home');
    }

    protected function getTooManyLoginAttemptsMessage() {
        return sprintf('/^%s$/', str_replace('\:seconds', '\d+', preg_quote(__('auth.throttle'), '/')));
    }

    public function testUserCanViewALoginForm() {
        $response = $this->get($this->loginGetRoute());

        $response->assertSuccessful();
        $response->assertViewIs('pub_theme::auth.login');
    }

    public function testUserCannotViewALoginFormWhenAuthenticated() {
        //Error: Class 'Database\Factories\Modules\LU\Models\UserFactory' not found
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get($this->loginGetRoute());

        $response->assertRedirect($this->guestMiddlewareRoute());
    }

    public function testUserCanLoginWithCorrectCredentials() {
        $password = 'i-love-laravel';
        $user = User::factory()->create([
            //'password' => Hash::make($password),
            //'passwd' => md5($password),
            'passwd' => $password,
        ]);

        $response = $this->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => $password,
        ]);

        //$response->assertRedirect($this->successfulLoginRoute());
        $this->assertAuthenticatedAs($user);
    }

    public function testRememberMeFunctionality() {
        $password = 'i-love-laravel';

        $user = User::factory()->create([
            //'auth_user_id' => random_int(1, 100),
            //'password' => Hash::make($password = 'i-love-laravel'),
            'passwd' => $password,
        ]);

        $response = $this->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => $password,
            'remember' => 'on',
        ]);

        $user = $user->fresh();

        //$response->assertRedirect($this->successfulLoginRoute());
        $response->assertCookie(Auth::guard()->getRecallerName(), vsprintf('%s|%s|%s', [
            $user->auth_user_id,
            $user->getRememberToken(),
            $user->password,
        ]));
        $this->assertAuthenticatedAs($user);
    }

    public function testUserCannotLoginWithIncorrectPassword() {
        $password = 'i-love-laravel';

        $user = User::factory()->create([
            //'password' => Hash::make('i-love-laravel'),
            'passwd' => $password,
        ]);

        $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect($this->loginGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        //$this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCannotLoginWithEmailThatDoesNotExist() {
        $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
            'email' => 'nobody@example.com',
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect($this->loginGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        //$this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCanLogout() {
        $this->be(User::factory()->create());

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
        $password = 'i-love-laravel';

        $user = User::factory()->create([
            //'password' => Hash::make('i-love-laravel'),
            'passwd' => $password,
        ]);

        foreach (range(0, 5) as $_) {
            $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
                'email' => $user->email,
                'password' => 'invalid-password',
            ]);
        }

        $response->assertRedirect($this->loginGetRoute());
        /*
        $response->assertSessionHasErrors('email');
        $this->assertMatchesRegularExpression(
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
        */
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}