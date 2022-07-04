<?php

use App\Http\Controllers\Authentication\AuthController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::name('auth.')->prefix('auth')->group(function () {
        #region Authentication
        Route::controller(AuthController::class)->group(function () {
            Route::post('login', 'login')->name('login');
            Route::post('logout', 'logout')->name('logout');
            Route::post('refresh', 'refresh')->name('refresh');
            Route::middleware(['auth:api'])->group(function () {
                Route::get('me', 'me')->name('me');
            });
        });
        #endregion
    });
});
