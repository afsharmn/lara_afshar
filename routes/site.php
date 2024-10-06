<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {

    Route::get('/', [\App\Http\Controllers\site\HomeController::class, 'index'])->name('index');

    //login
    Route::middleware(\App\Http\Middleware\SiteGuestAuthenticate::class)->group(function () {
        Route::get('/login', [\App\Http\Controllers\site\auth\LoginController::class, 'showLoginForm'])->name('showLoginForm');
        Route::post('/login', [\App\Http\Controllers\site\auth\LoginController::class, 'login'])->name('login');
    });

    Route::middleware(\App\Http\Middleware\SiteAuthenticate::class)->group(function () {

        Route::post('/logout', [\App\Http\Controllers\site\auth\LogoutController::class, 'logout'])->name('logout');

    });

});

