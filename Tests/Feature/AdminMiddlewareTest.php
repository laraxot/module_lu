<?php
namespace Modules\LU\Tests\Feature;

/**
* https://semaphoreci.com/community/tutorials/testing-middleware-in-laravel-with-phpunit
*
**/
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
//-----  MODELS  -----
use Modules\LU\Models\User;

class AdminMiddlewareTest extends TestCase
{
    /** @test */
    public function non_admins_are_redirected()
    {
        $user = factory(User::class)->make(['is_admin' => false]);

        $this->actingAs($user);

        $request = Request::create('/admin', 'GET');

        $middleware = new AdminMiddleware;

        $response = $middleware->handle($request, function () {});

        $this->assertEquals($response->getStatusCode(), 302);
    }


    /** @test */
    public function admins_are_not_redirected()
    {
        $user = factory(User::class)->make(['is_admin' => true]);

        $this->actingAs($user);

        $request = Request::create('/admin', 'GET');

        $middleware = new AdminMiddleware;

        $response = $middleware->handle($request, function () {});

        $this->assertEquals($response, null);
    }

    public function a_user_logs_in()
	{
	    $user =  factory(App\User::class)->create(['email' => 'john@example.com', 'password' => bcrypt('testpass123')]);

	    $this->visit(route('login'));
	    $this->type($user->email, 'email');
	    $this->type($user->password, 'password');
	    $this->press('Login');
	    $this->assertTrue(Auth::check());
	    $this->seePageIs(route('dashboard'));
	}

	public function a_user_can_log_in()
    {
        $user = factory(App\User::class)->create([
             'email' => 'john@example.com', 
             'password' => bcrypt('testpass123')
        ]);

        $this->visit(route('login'))
            ->type($user->email, 'email')
            ->type('testpass123', 'password')
            ->press('Login')
            ->see('Successfully logged in')
            ->onPage('/dashboard');
    }

    public function it_should_login_user()
{
    $credentials = [
        'email'    => 'jghenonig@gmail.com',
        'password' => '12345'
    ];
    $this->visit('/auth/login')
        ->submitForm('Login',  $credentials)
        ->andSee('Dashboard')->onPage('/');
}

public function loginWithWrongCredentials()
    {
        $this->visit('/')
            ->see('Login')
            ->type('unknown@example.org', 'email')
            ->type('invalid-password', 'password')
            ->check('remember')
            ->press('Login')
            ->seePageIs('/login')
            ->see('These credentials do not match our records');
    }



}