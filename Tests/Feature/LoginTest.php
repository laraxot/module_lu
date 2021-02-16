<?php
/**
 * https://medium.com/@DCzajkowski/testing-laravel-authentication-flow-573ea0a96318.
  * https://laravel-news.com/test-views-with-laravel-mojito
<<<<<<< HEAD
  * https://github.com/dczajkowski/auth-tests
 */

namespace Modules\LU\Tests\Feature;
use Tests\TestCase;

//URL::defaults(['locale' => $request->user()->locale]);
//\URL::forceRootUrl('http://www.myapp.com/en');


use Modules\LU\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase {

=======
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
>>>>>>> ae14cf9 (first)

    /*
    public function setUp(): void{
        URL::defaults(['lang' => 'it' ]);
        parent::setUp();
    }
    */
<<<<<<< HEAD
    protected function successfulLoginRoute()   {
        return route('home');
    }

    protected function loginGetRoute()
    {
        return route('login');
    }

    protected function loginPostRoute()
    {
        return route('login');
    }

    protected function logoutRoute()
    {
        return route('logout');
    }

    protected function successfulLogoutRoute()
    {
        return '/';
    }

    protected function guestMiddlewareRoute()
    {
        return route('home');
    }

    protected function getTooManyLoginAttemptsMessage()
    {
        return sprintf('/^%s$/', str_replace('\:seconds', '\d+', preg_quote(__('auth.throttle'), '/')));
    }

    public function testUserCanViewALoginForm(){

        URL::defaults(['lang' => 'it']);

=======
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
>>>>>>> ae14cf9 (first)
        $response = $this->get($this->loginGetRoute());

        $response->assertSuccessful();
        $response->assertViewIs('pub_theme::auth.login');
    }

<<<<<<< HEAD
    public function testUserCannotViewALoginFormWhenAuthenticated()
    {

        URL::defaults(['lang' => 'it' ]);

=======
    public function testUserCannotViewALoginFormWhenAuthenticated() {
>>>>>>> ae14cf9 (first)
        //Error: Class 'Database\Factories\Modules\LU\Models\UserFactory' not found
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get($this->loginGetRoute());

        $response->assertRedirect($this->guestMiddlewareRoute());
    }

<<<<<<< HEAD
    public function testUserCanLoginWithCorrectCredentials()
    {
        URL::defaults(['lang' => 'it' ]);

=======
    public function testUserCanLoginWithCorrectCredentials() {
>>>>>>> ae14cf9 (first)
        $password = 'i-love-laravel';
        $user = User::factory()->create([
            //'password' => Hash::make($password),
            //'passwd' => md5($password),
            'passwd' => $password,
        ]);

<<<<<<< HEAD

=======
>>>>>>> ae14cf9 (first)
        $response = $this->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => $password,
        ]);

        //$response->assertRedirect($this->successfulLoginRoute());
        $this->assertAuthenticatedAs($user);
    }

<<<<<<< HEAD
    public function testRememberMeFunctionality()
    {

        URL::defaults(['lang' => 'it' ]);
=======
    public function testRememberMeFunctionality() {
>>>>>>> ae14cf9 (first)
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

<<<<<<< HEAD
    public function testUserCannotLoginWithIncorrectPassword()
    {
        URL::defaults(['lang' => 'it' ]);
=======
    public function testUserCannotLoginWithIncorrectPassword() {
>>>>>>> ae14cf9 (first)
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

<<<<<<< HEAD
    public function testUserCannotLoginWithEmailThatDoesNotExist()
    {
        URL::defaults(['lang' => 'it' ]);

=======
    public function testUserCannotLoginWithEmailThatDoesNotExist() {
>>>>>>> ae14cf9 (first)
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

<<<<<<< HEAD
    public function testUserCanLogout()
    {
        URL::defaults(['lang' => 'it' ]);
=======
    public function testUserCanLogout() {
>>>>>>> ae14cf9 (first)
        $this->be(User::factory()->create());

        $response = $this->post($this->logoutRoute());

        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }

<<<<<<< HEAD
    public function testUserCannotLogoutWhenNotAuthenticated()
    {
        URL::defaults(['lang' => 'it' ]);
=======
    public function testUserCannotLogoutWhenNotAuthenticated() {
>>>>>>> ae14cf9 (first)
        $response = $this->post($this->logoutRoute());

        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }

<<<<<<< HEAD
    public function testUserCannotMakeMoreThanFiveAttemptsInOneMinute()
    {
        URL::defaults(['lang' => 'it' ]);
=======
    public function testUserCannotMakeMoreThanFiveAttemptsInOneMinute() {
>>>>>>> ae14cf9 (first)
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
<<<<<<< HEAD
}
=======
}
>>>>>>> ae14cf9 (first)
