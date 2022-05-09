<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

//use Illuminate\Support\Facades\App;

$namespace = '\Modules\LU'; //$this->getNamespace();
//$prefix = App::getLocale();
$prefix = '{lang}';

Route::group(
    [
        'prefix' => $prefix,
        //'where' => ['lang' => '[a-zA-Z]{2}'], //lang 2 caratteri it, en, es ...
        'middleware' => ['web'],
        'namespace' => $namespace.'\Http\Controllers',
    ],
    function () {
        Auth::routes(['verify' => true]);
    }
);

$middleware = ['web', 'guest'];
Route::group(
    [
        'prefix' => $prefix,
        'middleware' => $middleware,
        'namespace' => $namespace.'\Http\Controllers\Auth',
    ],
    function () {
        //--------- SOCIALITE ----------------
        Route::get(
            'login/{provider}',
            [
                'as' => 'login.provider',
                'uses' => 'SocialiteController@redirectToProvider',
            ]
        );
        Route::get(
            'login/{provider}/callback',
            [
                'as' => 'login.provider.callback',
                'uses' => 'SocialiteController@handleProviderCallback',
            ]
        );
        /*
        //--------- per continuare o fai login o registrati ----------
        //---- meglio buttare a login e risparmiare pagina, controller
        Route::get('login-notice',
            [
                'as' => 'login.notice',
                'uses' => 'NoticeController',
            ]
        );
        */
    }
);

//---  https://laraveldaily.com/laravel-auth-make-registration-invitation-only/
//Route::get('register/request', $namespace.'\Controllers\Auth\InvitationController@requestInvitation')->name('requestInvitation');
//Route::get('invitation/create', $namespace.'\Http\Controllers\Auth\InvitationController@create')->middleware('web')->name('requestInvitation');
//Route::post('invitation', $namespace.'\Http\Controllers\Auth\InvitationController@store')->middleware('guest')->name('storeInvitation');
