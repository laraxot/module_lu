<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Modules\Xot\Services\FileService;

/**
 * Class ForgotPasswordController.
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
    public function showLinkRequestForm(Request $request) {
        /**
         * return ThemeService::getView(); //lu::auth.forgot_password.show_link_request_form.
         *
         * @phpstan-var view-string
         *
         * $view='lu::auth.passwords.email';
         * $view_params=[
         *   'view'=>$view,
         * ];
         * return view($view,$view_params);
         */
        /*
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

        throw new \Exception('<h3>Non esiste la view ['.$view.']</h3>['.__LINE__.']['.__FILE__.']');
        */
        $lang = app()->getLocale();
        $pieces = [
            'layouts.app',
            'layouts.plane',
            'layouts.partials.htmlheader',
            'layouts.partials.scripts',
        ];
        foreach ($pieces as $piece) {
            FileService::viewCopy('ui::'.$piece, 'pub_theme::'.$piece);
        }

        $piece = 'auth.passwords.email';
        FileService::viewCopy('lu::'.$piece, 'pub_theme::'.$piece);
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
