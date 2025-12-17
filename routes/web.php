<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SocialiteController;


Route::get('/app-auth/redirect', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get('/app-auth/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');
