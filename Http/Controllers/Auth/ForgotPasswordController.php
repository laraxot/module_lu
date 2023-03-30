<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Xot\Services\FileService;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

/**
 * Class ForgotPasswordController.
 */
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     */
    /*
    public function __construct() {
        $this->middleware('guest');
    }
    */

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function showLinkRequestForm(Request $request)
    {
        $lang = app()->getLocale();


        $piece = 'auth.passwords.email';
        FileService::viewCopy('lu::' . $piece, 'pub_theme::' . $piece);

        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::auth.passwords.email';
        $view_params = [
            'lang' => $lang,
            'title' => 'Reset Password',
        ];

        return response()->view($view, $view_params);
    }
}
