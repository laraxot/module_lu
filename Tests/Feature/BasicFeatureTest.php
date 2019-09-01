<?php
namespace Modules\LU\Tests\Feature;
/**
* https://viblo.asia/p/feature-test-trong-laravel-GrLZD8wwZk0
*
**/
//-----  MODELS  -----
use Modules\LU\Models\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicFeatureTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserCanViewLogin(){
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertViewIs('auth.login')->assertSee('Login');
    }

    public function testUserCanViewRegister(){
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertViewIs('auth.register')->assertSee('register');
    }

    public function testCanRegister(){
        $this->assertGuest();
        $user = factory(User::class)->make();

        $response = $this->post('/register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'feature',
            'password_confirmation' => 'feature'
        ]);

        $response->assertStatus(302)->assertRedirect('/home');
        $this->assertAuthenticated();
    }

    public function testCanLogin()
{
    $this->assertGuest();
    $user = factory(User::class)->create([
        'password' => bcrypt('feature'),
    ]);

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'feature',
    ])
        ->assertStatus(302)
        ->assertRedirect('/home');
    $this->assertAuthenticatedAs($user);
}

public function testUserCannotLoginWithIncorrectPassword()
{
    $user = factory(User::class)->make([
        'password' => bcrypt('laravel'),
    ]);

    $response = $this->from('/login')->post('/login', [
        'email' => $user->email,
        'password' => 'invalid-password',
    ]);

    $response->assertRedirect('/login');
    $response->assertSessionHasErrors('email');
    $this->assertTrue(session()->hasOldInput('email'));
    $this->assertFalse(session()->hasOldInput('password'));
    $this->assertGuest();
}


}//end class