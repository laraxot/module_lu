<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Modules\Xot\Datas\XotData;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\LU\Traits\VerifiesEmails;
use Modules\Xot\Services\FileService;
use Modules\Xot\Contracts\UserContract;
use Illuminate\Auth\Access\AuthorizationException;

/**
 * Class VerificationController.
 */
class VerificationController extends Controller
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $piece = 'auth.verify';
        /**
         * @phpstan-var view-string
         */
        FileService::viewCopy('lu::' . $piece, 'pub_theme::' . $piece);

        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::' . $piece;

        $view_params = [
            'view' => $view,
        ];

        $piece_successful = 'auth.verify_successful';

        /**
         * @phpstan-var view-string
         */
        $view_successful = 'pfed::' . $piece_successful;

        $view_params_successful = [
            'view' => $view_successful,
        ];

        /**
         * @var UserContract
         */
        $user = $request->user();
        if (null == $user) {
            throw new \Exception('[' . __LINE__ . '][' . __FILE__ . ']');
        }



        return $user->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : response()->view($view, $view_params);
    }
}
