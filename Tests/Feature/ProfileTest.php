<?php

namespace Modules\LU\Tests\Feature;

/*
* https://github.com/zaratedev/testing-laravel/blob/master/tests/Feature/UserTest.php
*
**/

//-----  MODELS  -----

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\URL;
use Modules\LU\Models\User;
use Modules\LU\Services\ProfileService;
use Tests\TestCase;

class ProfileTest extends TestCase {
    //use DatabaseMigrations;
    public function setUp(): void {
        parent::setUp();
        URL::defaults(['lang' => 'it']);
    }

    /** @test */
    public function aUserHasAProfile() {
        $user = User::factory()->create();
        $profile_panel = ProfileService::get($user)->getPanel();

        $response = $this->get($profile_panel->url());
        $response->assertSee($user->name)
            ->assertStatus(200);
    }

    /** @test */
    public function itAuthenticatedUserCanViewThePageForEditHisProfile() {
        $user = User::inRandomOrder()->first();
        $profile_panel = ProfileService::get($user)->getPanel();
        $response = $this->actingAs($user)->get($profile_panel->url(['act' => 'edit']));
        dd([$user->handle, $profile_panel->row]);
        $response->assertStatus(200);
        /*
        $this->signIn();
        $response = $this->get('/profiles/'.auth()->id().'/edit');
        $response->assertSee('Edit Profile')
            ->assertStatus(200);
        */
    }

    /** @test */
    public function itAuthenticatedUserCanEditHisProfile() {
        $user = create('App\User');
        $this->signIn($user);
        $response = $this->post('/profiles/update/'.auth()->id(), [
            '_token' => csrf_token(),
            'name' => 'Jonathan',
            'last_name' => 'zarate hernandez',
            'email' => 'zaratedev@gmail.com',
            'password' => '',
            'password_confirmation' => '',
            'job' => 'developer',
        ]);
        $response->assertRedirect('/profiles/'.$user->id);
        $this->assertEquals($user->fresh()->name, 'Jonathan');
    }

    /** @test */
    public function unauthorizedUsersCannotEditAProfile() {
        $this->withExceptionHandling();
        $user = create('App\User');
        $response = $this->post('/profiles/update/'.$user->id, [
            '_token' => csrf_token(),
            'name' => 'Jonathan',
            'last_name' => 'zarate hernandez',
            'email' => 'zaratedev@gmail.com',
            'password' => '',
            'password_confirmation' => '',
            'job' => 'developer',
        ]);
        $response->assertRedirect('/login');
        $this->signIn()->post("/profiles/update/{$user->id}", [
            '_token' => csrf_token(),
            'name' => 'Jonathan',
            'last_name' => 'zarate hernandez',
            'email' => 'zaratedev@gmail.com',
            'password' => '',
            'password_confirmation' => '',
            'job' => 'developer',
        ])->assertStatus(403); // Unauthorized action
    }

    /** @test */
    public function itAuthenticatedUserCanDeleteHisProfile() {
        $user = create('App\User');
        $this->signIn($user);
        $this->post("/profiles/delete/{$user->id}")->assertRedirect('/');
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    /** @test */
    public function unauthorizedUsersCannotDeleteAProfile() {
        $this->withExceptionHandling();
        $user = create('App\User');
        $this->post("/profiles/delete/{$user->id}")
            ->assertRedirect('login');
        $this->signIn()->post("/profiles/delete/{$user->id}")
            ->assertStatus(403); // Unauthorized action
    }
}//end class
