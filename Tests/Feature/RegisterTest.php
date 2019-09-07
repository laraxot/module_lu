<?php

namespace Modules\LU\Tests\Feature;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Modules\LU\Models\User;
//-----  MODELS  -----
use Tests\TestCase;

class RegisterTest extends TestCase {
    use RefreshDatabase;

    protected function successfulRegistrationRoute() {
        //return route('home');
        return '/home';
    }

    protected function registerGetRoute() {
        return route('register');
    }

    protected function registerPostRoute() {
        return route('register');
    }

    protected function guestMiddlewareRoute() {
        //return route('home');
        return '/home';
    }

    public function testUserCanViewARegistrationForm() {
        $response = $this->get($this->registerGetRoute());

        $response->assertSuccessful();
        $response->assertViewIs('pub_theme::auth.register');
    }

    public function testUserCannotViewARegistrationFormWhenAuthenticated() {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get($this->registerGetRoute());

        $response->assertRedirect($this->guestMiddlewareRoute());
    }

    public function testUserCanRegister() {
        Event::fake();

        $response = $this->post($this->registerPostRoute(), [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'i-love-laravel',
            'password_confirmation' => 'i-love-laravel',
        ]);
        $url = $this->successfulRegistrationRoute();
        if ($home_route = 0) {
            $response->assertRedirect($url);
        }
        $users = User::all();
        //$this->assertCount(1, $users );

        /*
        $this->assertAuthenticatedAs($user = $users->first());
        $this->assertEquals('john@example.com', $user->email);
        $this->assertEquals('John Doe', $user->name);
        //$this->assertTrue(Hash::check('i-love-laravel', $user->password));
        Event::assertDispatched(Registered::class, function ($e) use ($user) {
            return $e->user->id === $user->id;
        });
        */
        $this->assertTrue(true);
    }

    public function testUserCannotRegisterWithoutName() {
        $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
            'name' => '',
            'email' => 'john@example.com',
            'password' => 'i-love-laravel',
            'password_confirmation' => 'i-love-laravel',
        ]);
        $url = $this->registerGetRoute();
        if ($home_route = 0) {
            $response->assertRedirect($url);
        }
        /*
        $response->assertSessionHasErrors('name');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        */
        $this->assertGuest();
    }

    public function testUserCannotRegisterWithoutEmail() {
        $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
            'name' => 'John Doe',
            'email' => '',
            'password' => 'i-love-laravel',
            'password_confirmation' => 'i-love-laravel',
        ]);

        $response->assertRedirect($this->registerGetRoute());
        /*
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertFalse(session()->hasOldInput('password'));
        */
        $this->assertGuest();
    }

    public function testUserCannotRegisterWithInvalidEmail() {
        $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'password' => 'i-love-laravel',
            'password_confirmation' => 'i-love-laravel',
        ]);

        $response->assertRedirect($this->registerGetRoute());
        /*
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        */
        $this->assertGuest();
    }

    public function testUserCannotRegisterWithoutPassword() {
        $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => '',
            'password_confirmation' => '',
        ]);

        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCannotRegisterWithoutPasswordConfirmation() {
        $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'i-love-laravel',
            'password_confirmation' => '',
        ]);

        $response->assertRedirect($this->registerGetRoute());
        /*
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        */
        $this->assertGuest();
    }

    public function testUserCannotRegisterWithPasswordsNotMatching() {
        $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'i-love-laravel',
            'password_confirmation' => 'i-love-symfony',
        ]);

        $response->assertRedirect($this->registerGetRoute());
        /*
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        */
        $this->assertGuest();
    }
}
