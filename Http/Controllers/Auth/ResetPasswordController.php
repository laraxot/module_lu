<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
//--------- Models ------------
use Illuminate\View\View;
use Modules\LU\Models\User;
use Modules\Xot\Contracts\UserContract;

/**
 * Class ResetPasswordController.
 */
class ResetPasswordController extends Controller {
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
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Reset the given user's password.
     *
     * @param UserContract $user
     */
    protected function resetPassword($user, string $password) {
        $user->forceFill([
            'passwd' => $password,
            'remember_token' => Str::random(60),
        ])->save();

        $this->guard()->login($user);
    }

    //@return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param string|null $token
     */
<<<<<<< HEAD
    public function showResetForm(Request $request, $token = null): ViewContract {
        //qui da fare controllo se esiste pub_theme::auth.passwords.reset mostra quello
        //se no se esiste adm_theme::auth.passwords.reset mostra quello
        //altrimenti mostra 'lu::auth.passwords.reset' che esiste per forza
        $lang = app()->getLocale();
=======
    public function showResetForm(Request $request, $lang = null, $token = null): ViewContract {
        //qui da fare controllo se esiste pub_theme::auth.passwords.reset mostra quello
        //se no se esiste adm_theme::auth.passwords.reset mostra quello
        //altrimenti mostra 'lu::auth.passwords.reset' che esiste per forza
        //dddx($request->route()->parameters());
        //$lang = app()->getLocale();
>>>>>>> ae14cf9 (first)
        $locz = ['pub_theme', 'adm_theme', 'lu'];
        $tpl = 'auth.passwords.reset';
        if ($request->ajax()) {
            $tpl = 'auth.passwords.ajax_reset';
        }
        $view_params = ['token' => $token, 'email' => $request->email, 'lang' => $lang];
        $views = collect($locz)->map(function ($item) use ($tpl) {
            return $item.'::'.$tpl;
        })->all();
<<<<<<< HEAD

        return view()->first($views, $view_params);
        /*
        foreach ($locz as $loc) {
            $view = $loc.'::'.$tpl;
            if (\View::exists($view)) {
                return view($view)->with(
                    ['token' => $token, 'email' => $request->email, 'lang' => $lang]
                );
            }
        }

        return '<h3>Non esiste la view ['.$view.']</h3>['.__LINE__.']['.__FILE__.']';
        */
        /*
        return view('lu::auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
        */
    }
}
=======
        //dddx($view_params);

        return view()->first($views, $view_params);
    }
}
>>>>>>> ae14cf9 (first)
