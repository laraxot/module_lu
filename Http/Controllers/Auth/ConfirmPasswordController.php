<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Modules\Xot\Services\FileService;
use App\Providers\RouteServiceProvider;
use Modules\LU\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends BaseController
{
    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = '/'; // RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display the password confirmation view.
     *
     * @return \Illuminate\View\View
     */
    public function showConfirmForm()
    {
        $lang = app()->getLocale();
        $piece = 'auth.passwords.confirm';
        FileService::viewCopy('lu::' . $piece, 'pub_theme::' . $piece);

        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::' . $piece;
        $view_params = [
            'lang' => $lang,
            'title' => 'Confirm Password',
        ];

        return view($view, $view_params);
    }
}
