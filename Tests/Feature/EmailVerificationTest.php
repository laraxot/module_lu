<?php

namespace Modules\LU\Tests\Feature;

/*
* https://github.com/DCzajkowski/auth-tests/blob/master/src/Console/stubs/tests/Feature/Auth/LoginTest.php
*
**/

<<<<<<< HEAD
use Illuminate\Auth\Notifications\VerifyEmail;
//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Modules\LU\Models\User;
//-----  MODELS  -----
use Tests\TestCase;


class EmailVerificationTest extends TestCase{
=======
//use Illuminate\Auth\Notifications\VerifyEmail;
use  Illuminate\Support\Facades\Notification;
//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Modules\LU\Models\User;
use Modules\LU\Notifications\VerifyEmail;
//-----  MODELS  -----
use Tests\TestCase;

class EmailVerificationTest extends TestCase {
>>>>>>> ae14cf9 (first)
    //use RefreshDatabase;

    protected $verificationVerifyRouteName = 'verification.verify';

<<<<<<< HEAD
    protected function successfulVerificationRoute()
    {
        return route('home');
    }

    protected function verificationNoticeRoute()
    {
        return route('verification.notice');
    }

    protected function validVerificationVerifyRoute($user)
    {
=======
    public function setUp(): void {
        parent::setUp();
        URL::defaults(['lang' => 'it']);
    }

    protected function successfulVerificationRoute() {
        return route('home');
    }

    protected function verificationNoticeRoute() {
        return route('verification.notice');
    }

    protected function validVerificationVerifyRoute($user) {
>>>>>>> ae14cf9 (first)
        return URL::signedRoute($this->verificationVerifyRouteName, [
            'id' => $user->getKey(),
            'hash' => sha1($user->getEmailForVerification()),
        ]);
    }

<<<<<<< HEAD
    protected function invalidVerificationVerifyRoute($user)
    {
=======
    protected function invalidVerificationVerifyRoute($user) {
>>>>>>> ae14cf9 (first)
        return route($this->verificationVerifyRouteName, [
            'id' => $user->getKey(),
            'hash' => 'invalid-hash',
        ]);
    }

<<<<<<< HEAD
    protected function verificationResendRoute()
    {
        return route('verification.resend');
    }

    protected function loginRoute()
    {
        return route('login');
    }

    public function testGuestCannotSeeTheVerificationNotice()  {

        URL::defaults(['lang' => 'it']);

=======
    protected function verificationResendRoute() {
        return route('verification.resend');
    }

    protected function loginRoute() {
        return route('login');
    }

    public function testGuestCannotSeeTheVerificationNotice() {
>>>>>>> ae14cf9 (first)
        $response = $this->get($this->verificationNoticeRoute());

        $response->assertRedirect($this->loginRoute());
    }

    public function testUserSeesTheVerificationNoticeWhenNotVerified() {
<<<<<<< HEAD

        URL::defaults(['lang' => 'it']);

=======
>>>>>>> ae14cf9 (first)
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)->get($this->verificationNoticeRoute());

        $response->assertStatus(200);
        //$response->responseHasView();
        //dd(get_class_methods($response));

        $response->assertViewIs('lu::auth.verify');
    }

<<<<<<< HEAD
    public function testVerifiedUserIsRedirectedHomeWhenVisitingVerificationNoticeRoute()
    {

        URL::defaults(['lang' => 'it']);

=======
    public function testVerifiedUserIsRedirectedHomeWhenVisitingVerificationNoticeRoute() {
>>>>>>> ae14cf9 (first)
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $response = $this->actingAs($user)->get($this->verificationNoticeRoute());
<<<<<<< HEAD

        $response->assertRedirect($this->successfulVerificationRoute());
    }

    public function testGuestCannotSeeTheVerificationVerifyRoute()
    {
        URL::defaults(['lang' => 'it']);

=======
        $response->assertStatus(302);

        //$response->assertRedirect($this->successfulVerificationRoute());
    }

    public function testGuestCannotSeeTheVerificationVerifyRoute() {
>>>>>>> ae14cf9 (first)
        $user = User::factory()->create([
            //'id' => 1,
            'email_verified_at' => null,
        ]);

        $response = $this->get($this->validVerificationVerifyRoute($user));

        $response->assertRedirect($this->loginRoute());
    }

<<<<<<< HEAD
    public function testUserCannotVerifyOthers()
    {
        URL::defaults(['lang' => 'it']);

        $user = User::factory()->create([
            'auth_user_id' => 101,
            'email_verified_at' => null,
        ]);

        $user2 = User::factory()->create(['auth_user_id' => 102, 'email_verified_at' => null]);
=======
    public function testUserCannotVerifyOthers() {
        $user = User::factory()->create([
            //    'auth_user_id' => 101,
            'email_verified_at' => null,
        ]);

        $user2 = User::factory()->create([
            //    'auth_user_id' => 102,
            'email_verified_at' => null,
        ]);
>>>>>>> ae14cf9 (first)

        $response = $this->actingAs($user)->get($this->validVerificationVerifyRoute($user2));

        $response->assertForbidden();
        $this->assertFalse($user2->fresh()->hasVerifiedEmail());
    }

<<<<<<< HEAD
    public function testUserIsRedirectedToCorrectRouteWhenAlreadyVerified()
    {
        URL::defaults(['lang' => 'it']);
=======
    public function testUserIsRedirectedToCorrectRouteWhenAlreadyVerified() {
>>>>>>> ae14cf9 (first)
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $response = $this->actingAs($user)->get($this->validVerificationVerifyRoute($user));
<<<<<<< HEAD
=======
        $response->assertStatus(302);
>>>>>>> ae14cf9 (first)

        //$response->assertRedirect($this->successfulVerificationRoute());
    }

<<<<<<< HEAD
    public function testForbiddenIsReturnedWhenSignatureIsInvalidInVerificationVerifyRoute()
    {
        URL::defaults(['lang' => 'it']);
=======
    public function testForbiddenIsReturnedWhenSignatureIsInvalidInVerificationVerifyRoute() {
>>>>>>> ae14cf9 (first)
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $response = $this->actingAs($user)->get($this->invalidVerificationVerifyRoute($user));

        $response->assertStatus(403);
    }

<<<<<<< HEAD
    public function testUserCanVerifyThemselves()
    {
        URL::defaults(['lang' => 'it']);
=======
    public function testUserCanVerifyThemselves() {
>>>>>>> ae14cf9 (first)
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)->get($this->validVerificationVerifyRoute($user));

        //$response->assertRedirect($this->successfulVerificationRoute());
        $this->assertNotNull($user->fresh()->email_verified_at);
    }

<<<<<<< HEAD
    public function testGuestCannotResendAVerificationEmail()
    {
        URL::defaults(['lang' => 'it']);
=======
    public function testGuestCannotResendAVerificationEmail() {
>>>>>>> ae14cf9 (first)
        $response = $this->post($this->verificationResendRoute());

        $response->assertRedirect($this->loginRoute());
    }

<<<<<<< HEAD
    public function testUserIsRedirectedToCorrectRouteIfAlreadyVerified()
    {
        URL::defaults(['lang' => 'it']);
=======
    public function testUserIsRedirectedToCorrectRouteIfAlreadyVerified() {
>>>>>>> ae14cf9 (first)
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $response = $this->actingAs($user)->post($this->verificationResendRoute());
<<<<<<< HEAD
=======
        $response->assertStatus(302);
>>>>>>> ae14cf9 (first)

        //$response->assertRedirect($this->successfulVerificationRoute());
    }

<<<<<<< HEAD
    public function testUserCanResendAVerificationEmail()
    {
        URL::defaults(['lang' => 'it']);
=======
    public function testUserCanResendAVerificationEmail() {
>>>>>>> ae14cf9 (first)
        Notification::fake();
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)
            ->from($this->verificationNoticeRoute())
            ->post($this->verificationResendRoute());

<<<<<<< HEAD
        //Notification::assertSentTo($user, VerifyEmail::class);
        //$response->assertRedirect($this->verificationNoticeRoute());
    }
}
=======
        Notification::assertSentTo($user, VerifyEmail::class);

        $response->assertStatus(302);

        //$response->assertRedirect($this->verificationNoticeRoute());
    }
}
>>>>>>> ae14cf9 (first)
