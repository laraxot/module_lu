<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\LU\Http\Controllers\Api\UserController;

Route::prefix('/user')->group(
    function () {
        //authenticate user

        Route::post('/login', [UserController::class, 'login'])
            ->name('api.login');

        Route::get('/login', [UserController::class, 'loginTest'])
            ->name('api.loginTest');

        Route::get('/logout', [UserController::class, 'logout'])
            ->name('api.logout');

        //get user credentials
        Route::middleware('auth:api')
            ->get('/current', [UserController::class, 'getCurrentUser'])
            ->name('api.currentUser');
    }
);
