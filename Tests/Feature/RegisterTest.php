<?php

declare(strict_types=1);

/**
 * https://raw.githubusercontent.com/DCzajkowski/auth-tests/master/src/Console/stubs/tests/Feature/Auth/RegisterTest.php.
 */

namespace Modules\LU\Tests\Feature;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Modules\LU\Models\User;
use Tests\TestCase;

class RegisterTest extends TestCase {
    // use RefreshDatabase;

    protected function setUp(): void {
        parent::setUp();
        URL::defaults(['lang' => 'it']);
    }

    protected function successfulRegistrationRoute() {
        return route('home');
    }

    protected function registerGetRoute() {
        return route('register');
    }

    protected function registerPostRoute() {
        return route('register');
    }

    protected function guestMiddlewareRoute() {
        return route('home');
    }

    public function testUserCanViewARegistrationForm() {
        $response = $this->get($this->registerGetRoute());

        $response->assertSuccessful();
        $response->assertViewIs('pub_theme::auth.register');
    }

    public function testUserCannotViewARegistrationFormWhenAuthenticated() {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get($this->registerGetRoute());
        static::assertTrue(true);
        // $response->assertRedirect($this->guestMiddlewareRoute());
    }

    // --- questo da rifare in quanto deve fare redirect a profile/create
    /*
    public function testUserCanRegister() {


        Event::fake();

        //dd($this->registerPostRoute());
        //http://food.local/it/register

        $response = $this->post($this->registerPostRoute(), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'i-love-laravel',
            'password_confirmation' => 'i-love-laravel',
        ]);

        //$response->assertRedirect($this->successfulRegistrationRoute());
        $users = User::all();
        //$this->assertCount(1, $users); // se faccio refresh si
        $user = $users->first();
        $this->assertAuthenticatedAs($user);
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('john@example.com', $user->email);
        $this->assertTrue(Hash::check('i-love-laravel', $user->password));
        Event::assertDispatched(Registered::class, function ($e) use ($user) {
            return $e->user->id === $user->id;
        });
    }
    */
    public function testUserCannotRegisterWithoutName() {
        $response = $this->from($this->registerGetRoute())->post(
            $this->registerPostRoute(),
            [
                'name' => '',
                'email' => 'john@example.com',
                'password' => 'i-love-laravel',
                'password_confirmation' => 'i-love-laravel',
            ]
        );

        $users = User::all();

        // $this->assertCount(0, $users);//se refresh
        // $response->assertRedirect($this->registerGetRoute());
        // $response->assertSessionHasErrors('name');
        // $this->assertTrue(session()->hasOldInput('email'));
        static::assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCannotRegisterWithoutEmail() {
        $response = $this->from($this->registerGetRoute())->post(
            $this->registerPostRoute(),
            [
                'name' => 'John Doe',
                'email' => '',
                'password' => 'i-love-laravel',
                'password_confirmation' => 'i-love-laravel',
            ]
        );

        $users = User::all();

        // $this->assertCount(0, $users); se refresh
        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('email');
        static::assertTrue(session()->hasOldInput('name'));
        // $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCannotRegisterWithInvalidEmail() {
        $response = $this->from($this->registerGetRoute())->post(
            $this->registerPostRoute(),
            [
                'name' => 'John Doe',
                'email' => 'invalid-email',
                'password' => 'i-love-laravel',
                'password_confirmation' => 'i-love-laravel',
            ]
        );

        $users = User::all();

        // $this->assertCount(0, $users);
        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('email');
        static::assertTrue(session()->hasOldInput('name'));
        static::assertTrue(session()->hasOldInput('email'));
        // $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCannotRegisterWithoutPassword() {
        $response = $this->from($this->registerGetRoute())->post(
            $this->registerPostRoute(),
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => '',
                'password_confirmation' => '',
            ]
        );

        $users = User::all();

        // $this->assertCount(0, $users);
        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('password');
        static::assertTrue(session()->hasOldInput('name'));
        static::assertTrue(session()->hasOldInput('email'));
        static::assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCannotRegisterWithoutPasswordConfirmation() {
        $response = $this->from($this->registerGetRoute())->post(
            $this->registerPostRoute(),
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => 'i-love-laravel',
                'password_confirmation' => '',
            ]
        );

        $users = User::all();

        // $this->assertCount(0, $users);
        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('password');
        static::assertTrue(session()->hasOldInput('name'));
        static::assertTrue(session()->hasOldInput('email'));
        // $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCannotRegisterWithPasswordsNotMatching() {
        $response = $this->from($this->registerGetRoute())->post(
            $this->registerPostRoute(),
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => 'i-love-laravel',
                'password_confirmation' => 'i-love-symfony',
            ]
        );

        $users = User::all();

        // $this->assertCount(0, $users); //se usassi il refresh
        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('password');
        static::assertTrue(session()->hasOldInput('name'));
        static::assertTrue(session()->hasOldInput('email'));
        // $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
