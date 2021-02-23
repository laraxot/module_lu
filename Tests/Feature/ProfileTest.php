<?php

declare(strict_types=1);

namespace Modules\LU\Tests\Feature;

// Response status code [405] is not a redirect status code.  controllare se si sta sbaglianod il metodo ovvero post|put|path|delete

/*
* https://github.com/zaratedev/testing-laravel/blob/master/tests/Feature/UserTest.php
*
**/

//-----  MODELS  -----

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\URL;
use Modules\Blog\Models\Profile;
use Modules\LU\Models\User;
use Modules\LU\Services\ProfileService;
use Tests\TestCase;

class ProfileTest extends TestCase {
    //use DatabaseMigrations;
    public function setUp(): void {
        parent::setUp();
        URL::defaults(['lang' => 'it']);
    }

    protected function loginGetRoute() {
        return route('login');
    }

    /** @test */
    public function aUserHasAProfile() {
        //$user = User::factory()->create();
        $user = User::inRandomOrder()->first();

        $profile_panel = ProfileService::get($user)->getPanel();

        $response = $this->get($profile_panel->url());
        $response->assertSee($user->name)
            ->assertStatus(200);
    }

    /** @test */
    public function testItAuthenticatedUserCanViewThePageForEditHisProfile() {
        $user = User::inRandomOrder()->first();
        $user2 = User::inRandomOrder()->first();

        $profile_panel = ProfileService::get($user)->getPanel();
        $url = $profile_panel->url(['act' => 'edit']);
        $response = $this->actingAs($user)->get($url);
        $response->assertStatus(200);
        $response = $this->actingAs($user2)->get($url);
        $response->assertStatus(403);
    }

    /* @test */

    public function testItAuthenticatedUserCanEditHisProfile() {
        $user = User::inRandomOrder()->first();

        $profile_panel = ProfileService::get($user)->getPanel();
        $url_update = $profile_panel->url(['act' => 'update']);
        $url_show = $profile_panel->url(['act' => 'show']);

        $data = [
            //'_token' => csrf_token(),
            'user' => [
                'first_name' => 'Jonathan',
                'last_name' => 'zarate hernandez',
            ],
            //'password' => '',
            //'password_confirmation' => '',
            //'job' => 'developer',
        ];

        $response = $this->actingAs($user)
            ->put($url_update, $data);

        $response->assertStatus(200);

        $this->assertEquals($user->fresh()->first_name, 'Jonathan');
    }

    /* @test */
    public function testUnauthorizedUsersCannotEditAProfile() {
        $this->withExceptionHandling();
        $user = User::inRandomOrder()->first();
        $user2 = User::inRandomOrder()->first();

        $profile_panel = ProfileService::get($user)->getPanel();

        $url_update = $profile_panel->url(['act' => 'update']);

        $data = [
            'name' => 'Jonathan',
            'last_name' => 'zarate hernandez',
            //'email' => 'zaratedev@gmail.com',
            //'password' => '',
            //'password_confirmation' => '',
            //'job' => 'developer',
        ];

        $response = $this->put($url_update, $data);

        //-'http://localhost/it/login'
        //+'http://localhost/it/login-notice?referer=it%2Fprofile%2Fanais01'
        //$response->assertRedirect($this->loginGetRoute());
        $response->assertStatus(302);

        $response = $this->actingAs($user2)->put($url_update, $data);
        $response->assertStatus(403); // Unauthorized action
    }

    /* @test */
    /* devo cancellare anche le cose collegate
    public function testItAuthenticatedUserCanDeleteHisProfile() {
        // questo lo creo per distruggerlo
        $user = User::factory()->create();
        $id = $user->getKey();

        $profile_panel = ProfileService::get($user)->getPanel();
        $url_destroy = $profile_panel->url(['act' => 'destroy']);

        $response = $this->actingAs($user)->delete($url_destroy);
        //$response->assertRedirect('/');
        $response->assertStatus(200);
        //$this->assertDatabaseMissing('users', ['id' => $user->id]);
        $find = User::find($id);
        dd([$id, $find]);
    }
    */

    /* @test */
    public function testUnauthorizedUsersCannotDeleteAProfile() {
        $this->withExceptionHandling();

        $user = User::inRandomOrder()->first();
        $user2 = User::inRandomOrder()->first();

        $profile_panel = ProfileService::get($user)->getPanel();

        $url_destroy = $profile_panel->url(['act' => 'destroy']);

        $response = $this->delete($url_destroy);
        //->assertRedirect($this->loginGetRoute());
        $response->assertStatus(302);
        $response = $this->actingAs($user2)
            ->delete($url_destroy);
        $response->assertStatus(403); // Unauthorized action
    }

    /* @test */
    public function testUnauthorizedUsersCanCreateAProfile() {
        //$this->assertTrue(true);
        $url_create = route('container0.create', ['container0' => 'profile']);
        $url_store = route('container0.store', ['container0' => 'profile']);
        $response = $this->get($url_create);
        $response->assertStatus(200);
        $data = Profile::factory()->raw();
        //dd(get_class_methods($profile_factory));
        //dd($profile_factory->raw());
        $response = $this->post($url_store, $data);
        $response->assertStatus(200);
        //$row = Profile::where($data)->first();
        //dd($row);
        //dd($data);
    }
}//end class