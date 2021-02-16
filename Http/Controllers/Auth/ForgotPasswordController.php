<?php

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

<<<<<<< HEAD
//use Modules\Theme\Services\ThemeService; //mi serviva per debug

/**
 * Class ForgotPasswordController
 * @package Modules\LU\Http\Controllers\Auth
=======
/**
 * Class ForgotPasswordController.
>>>>>>> ae14cf9 (first)
 */
class ForgotPasswordController extends Controller {
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
<<<<<<< HEAD
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Display the form to request a password reset link.
     * @param Request $request
     * @return string
=======
    /*
    public function __construct() {
        $this->middleware('guest');
    }
    */

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\View\View
>>>>>>> ae14cf9 (first)
     */
    public function showLinkRequestForm(Request $request) {
        //return ThemeService::getView(); //lu::auth.forgot_password.show_link_request_form
        //return view('lu::auth.passwords.email');
        $lang = app()->getLocale();
        $locz = ['pub_theme', 'adm_theme', 'lu'];
        $tpl = 'auth.passwords.email';
        if ($request->ajax()) {
            $tpl = 'auth.passwords.ajax_email';
        }
        $view_params = [
            'lang' => $lang,
            'title' => 'Reset Password',
        ];
        foreach ($locz as $loc) {
            $view = $loc.'::'.$tpl;
            if (\View::exists($view)) {
                $view_params['view'] = $view;

                return response()->view($view, $view_params);
            }
        }

<<<<<<< HEAD
        return '<h3>Non esiste la view ['.$view.']</h3>['.__LINE__.']['.__FILE__.']';
    }
}
=======
        throw new \Exception('<h3>Non esiste la view ['.$view.']</h3>['.__LINE__.']['.__FILE__.']');
    }
}
>>>>>>> ae14cf9 (first)
