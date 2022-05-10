<?php
/**
 * https://github.com/DCzajkowski/auth-tests/blob/master/src/Console/stubs/tests/Feature/Auth/EmailVerificationTest.php.
 */

declare(strict_types=1);

namespace Modules\LU\Tests\Feature;

use Illuminate\Support\Facades\Notification;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Modules\LU\Models\User;
use Modules\LU\Notifications\VerifyEmail;
// -----  MODELS  -----
use Tests\TestCase;

class EmailVerificationTest extends TestCase {
    // use RefreshDatabase;

    protected $verificationVerifyRouteName = 'verification.verify';

    protected function setUp(): void {
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
        return URL::signedRoute(
            $this->verificationVerifyRouteName, [
                'id' => $user->getKey(),
                'hash' => sha1($user->getEmailForVerification()),
            ]
        );
    }

    protected function invalidVerificationVerifyRoute($user) {
        return route(
            $this->verificationVerifyRouteName, [
                'id' => $user->getKey(),
                'hash' => 'invalid-hash',
            ]
        );
    }

    protected function verificationResendRoute() {
        return route('verification.resend');
    }

    protected function loginRoute() {
        return route('login');
    }

    public function testGuestCannotSeeTheVerificationNotice() {
        $response = $this->get($this->verificationNoticeRoute());

        $response->assertRedirect($this->loginRoute());
    }

    public function testUserSeesTheVerificationNoticeWhenNotVerified() {
        $user = User::factory()->create(
            [
                'email_verified_at' => null,
            ]
        );

        $response = $this->actingAs($user)->get($this->verificationNoticeRoute());

        $response->assertStatus(200);
        // $response->responseHasView();
        // dd(get_class_methods($response));

        $response->assertViewIs('lu::auth.verify');
    }

    public function testVerifiedUserIsRedirectedHomeWhenVisitingVerificationNoticeRoute() {
        $user = User::factory()->create(
            [
                'email_verified_at' => now(),
            ]
        );

        $response = $this->actingAs($user)->get($this->verificationNoticeRoute());
        $response->assertStatus(302);

        // $response->assertRedirect($this->successfulVerificationRoute());
    }

    public function testGuestCannotSeeTheVerificationVerifyRoute() {
        $user = User::factory()->create(
            [
                // 'id' => 1,
                'email_verified_at' => null,
            ]
        );

        $response = $this->get($this->validVerificationVerifyRoute($user));

        $response->assertRedirect($this->loginRoute());
    }

    public function testUserCannotVerifyOthers() {
        $user = User::factory()->create(
            [
                //    'user_id' => 101,
                'email_verified_at' => null,
            ]
        );

        $user2 = User::factory()->create(
            [
                //    'user_id' => 102,
                'email_verified_at' => null,
            ]
        );

        $response = $this->actingAs($user)->get($this->validVerificationVerifyRoute($user2));

        $response->assertForbidden();
        static::assertFalse($user2->fresh()->hasVerifiedEmail());
    }

    public function testUserIsRedirectedToCorrectRouteWhenAlreadyVerified() {
        $user = User::factory()->create(
            [
                'email_verified_at' => now(),
            ]
        );

        $response = $this->actingAs($user)->get($this->validVerificationVerifyRoute($user));
        $response->assertStatus(302);

        // $response->assertRedirect($this->successfulVerificationRoute());
    }

    public function testForbiddenIsReturnedWhenSignatureIsInvalidInVerificationVerifyRoute() {
        $user = User::factory()->create(
            [
                'email_verified_at' => now(),
            ]
        );

        $response = $this->actingAs($user)->get($this->invalidVerificationVerifyRoute($user));

        $response->assertStatus(403);
    }

    public function testUserCanVerifyThemselves() {
        $user = User::factory()->create(
            [
                'email_verified_at' => null,
            ]
        );

        $response = $this->actingAs($user)->get($this->validVerificationVerifyRoute($user));

        // $response->assertRedirect($this->successfulVerificationRoute());
        static::assertNotNull($user->fresh()->email_verified_at);
    }

    public function testGuestCannotResendAVerificationEmail() {
        $response = $this->post($this->verificationResendRoute());

        $response->assertRedirect($this->loginRoute());
    }

    public function testUserIsRedirectedToCorrectRouteIfAlreadyVerified() {
        $user = User::factory()->create(
            [
                'email_verified_at' => now(),
            ]
        );

        $response = $this->actingAs($user)->post($this->verificationResendRoute());
        $response->assertStatus(302);

        // $response->assertRedirect($this->successfulVerificationRoute());
    }

    public function testUserCanResendAVerificationEmail() {
        Notification::fake();
        $user = User::factory()->create(
            [
                'email_verified_at' => null,
            ]
        );

        $response = $this->actingAs($user)
            ->from($this->verificationNoticeRoute())
            ->post($this->verificationResendRoute());

        Notification::assertSentTo($user, VerifyEmail::class);

        $response->assertStatus(302);

        // $response->assertRedirect($this->verificationNoticeRoute());
    }
}
