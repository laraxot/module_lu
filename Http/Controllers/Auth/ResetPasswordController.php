<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\ResetsPasswords;
use Modules\LU\Traits\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// --------- Models ------------
use Illuminate\View\View;
use Modules\LU\Models\User;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Services\FileService;

/**
 * Class ResetPasswordController.
 */
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     */
    protected string $redirectTo = '/';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Reset the given user's password.
     *
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     *
     * @return void
     */
    protected function resetPassword(/* UserContract */$user, string $password)
    {
        $user->forceFill(
            [
                'passwd' => $password,
                'remember_token' => Str::random(60),
            ]
        )->save();
        // 55     Parameter #1 $user of method Illuminate\Contracts\Auth\StatefulGuard::login()
        // expects Illuminate\Contracts\Auth\Authenticatable,
        // Modules\Xot\Contracts\UserContract given.
        $this->guard()->login($user);
    }

    /** @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View */

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param string|null $lang
     * @param string|null $token
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|string|\Illuminate\Http\Response
     */
    public function showResetForm(Request $request, $lang = null, $token = null)
    {
        // qui da fare controllo se esiste pub_theme::auth.passwords.reset mostra quello
        // se no se esiste adm_theme::auth.passwords.reset mostra quello
        // altrimenti mostra 'lu::auth.passwords.reset' che esiste per forza
        // dddx($request->route()->parameters());
        // $lang = app()->getLocale();
        /*
        $locz = ['pub_theme', 'adm_theme', 'lu'];
        $tpl = 'auth.passwords.reset';
        if ($request->ajax()) {
            $tpl = 'auth.passwords.ajax_reset';
        }
        $view_params = ['token' => $token, 'email' => $request->email, 'lang' => $lang];
        $views = collect($locz)->map(function ($item) use ($tpl) {
            return $item.'::'.$tpl;
        })->all();
        //dddx($view_params);

        return view()->first($views, $view_params);
        */
        $piece = 'auth.passwords.reset';
        FileService::viewCopy('lu::' . $piece, 'pub_theme::' . $piece);
        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::' . $piece;
        $view_params = [
            'token' => $token,
            'email' => $request->email,
            'lang' => $lang,
            'title' => 'Reset Password',
        ];

        return response()->view($view, $view_params);
    }
}
