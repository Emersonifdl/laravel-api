<?php

use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::name('auth.')->prefix('auth')->group(function () {
        #region Authentication
        Route::controller(AuthController::class)->group(function () {
            Route::post('login', 'login')->name('login');
            Route::post('logout', 'logout')->name('logout');
            Route::post('refresh', 'refresh')->name('refresh');
        });
        #endregion
    });

    Route::middleware(['auth:api'])->group(function () {
        #region Profile
        Route::controller(ProfileController::class)->name('profile.')->group(function () {
            Route::get('/profile', 'me')->name('me');
            Route::get('/profile/{user}', 'show')->name('show');
        });
        #endregion

        #region People
        Route::apiResource('people', PersonController::class);
        #endregion
    });
});
