<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

<<<<<<< HEAD
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Modules\LU\Http\Controllers\BaseController;
use Modules\Xot\Services\FileService;
=======
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Xot\Services\FileService;
use Modules\LU\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
>>>>>>> be8aa77 (up)

/**
 * Class ForgotPasswordController.
 */
class ForgotPasswordController extends BaseController {
    use SendsPasswordResetEmails;

    protected string $redirectTo = '/';

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm() {
<<<<<<< HEAD
        $lang = app()->getLocale();
=======

        $lang = app()->getLocale();
        
>>>>>>> be8aa77 (up)
        $piece = 'auth.passwords.email';
        FileService::viewCopy('lu::'.$piece, 'pub_theme::'.$piece);

        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::'.$piece;
        $view_params = [
            'lang' => $lang,
            'title' => 'Reset Password',
        ];

        return view($view, $view_params);
    }
}
