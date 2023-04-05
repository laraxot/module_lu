<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Modules\LU\Http\Controllers\BaseController;
use Modules\Xot\Services\FileService;

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
        $lang = app()->getLocale();
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
