<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\LU\Http\Controllers\BaseController;
use Modules\LU\Traits\ResetsPasswords;
use Modules\Xot\Services\FileService;

/**
 * Class ResetPasswordController.
 */
class ResetPasswordController extends BaseController
{
    use ResetsPasswords;

    protected string $redirectTo = '/';

    public function showResetForm(Request $request): Renderable
    {
        $lang = app()->getLocale();
        $route = $request->route();
        $token = $route?->parameter('token');

        $piece = 'auth.passwords.reset';
        FileService::viewCopy('lu::'.$piece, 'pub_theme::'.$piece);
        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::'.$piece;
        $view_params = [
            'token' => $token,
            'email' => $request->email,
            'lang' => $lang,
            'title' => 'Reset Password',
        ];

        return view($view, $view_params);
    }

    /**
     * Set the user's password.
     *
     * old_param \Illuminate\Contracts\Auth\CanResetPassword $user
     *
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     * @param string                                     $password
     *
     * @return void
     */
    protected function setUserPassword($user, $password)
    {
        // $user->password = Hash::make($password);
        $user->update(['passwd' => $password]);
    }
}
