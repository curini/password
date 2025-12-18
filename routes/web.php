<?php

use Illuminate\Support\Facades\Route;

use Curini\Password\Http\Controllers\SocialiteController;

Route::group(['middleware' => ['web']], function () {
    Route::get('/app-auth/redirect', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
    Route::get('/app-auth/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');
});
