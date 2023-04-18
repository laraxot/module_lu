<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
// use Modules\LU\Traits\VerifiesEmails;
use Illuminate\Http\Request;
use Modules\LU\Http\Controllers\BaseController;
use Modules\Xot\Contracts\UserContract;
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
        $this->middleware('auth');
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
}
