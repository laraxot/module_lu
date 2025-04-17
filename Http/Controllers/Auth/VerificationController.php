<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
// use Modules\LU\Traits\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\LU\Http\Controllers\BaseController;
use Modules\LU\Models\User;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Services\FileService;

/**
 * Class VerificationController.
 */
class VerificationController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     */
    protected string $redirectTo = '/';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $xot = XotData::make();

        if ('pfed' == ! $xot->verification_type) {
            $this->middleware('auth');
        }

        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Show the email verification notice.
     *
     * old_return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $piece = 'auth.verify';
        FileService::viewCopy('lu::'.$piece, 'pub_theme::'.$piece);

        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::'.$piece;

        $view_params = [
            'view' => $view,
        ];

        /**
         * @var UserContract
         */
        $user = $request->user();
        if (null == $user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }

        return $user->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view($view, $view_params);
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request)
    {
        $xot = XotData::make();

        if ('pfed' == $xot->verification_type) {
            $user = User::find($request->route('id'));

            if (! hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
                throw new AuthorizationException();
            }

            if ($user->markEmailAsVerified()) {
                event(new Verified($user));
            }

            return redirect($this->redirectPath())->with('verified', true);
        }

        if (! hash_equals((string) $request->route('id'), (string) $request->user()->getKey())) {
            throw new AuthorizationException();
        }

        if (! hash_equals((string) $request->route('hash'), sha1($request->user()->getEmailForVerification()))) {
            throw new AuthorizationException();
        }

        if ($request->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
                        ? new JsonResponse([], 204)
                        : redirect($this->redirectPath());
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        if ($response = $this->verified($request)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect($this->redirectPath())->with('verified', true);
    }
}
