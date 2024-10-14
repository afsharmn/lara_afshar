<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {

    //login
    Route::middleware(\App\Http\Middleware\AdminGuestAuthenticate::class)->group(function () {
        Route::get('/login', [\App\Http\Controllers\admin\auth\LoginController::class, 'showLoginForm'])->name('showLoginForm');
        Route::post('/login', [\App\Http\Controllers\admin\auth\LoginController::class, 'login'])->name('login');
    });

    Route::middleware(\App\Http\Middleware\AdminAuthenticate::class)->group(function () {

        Route::get('/', [\App\Http\Controllers\admin\HomeController::class, 'index'])->name('index');

        Route::get('/media', [\App\Http\Controllers\admin\MediaController::class, 'index'])->name('media.index');
        Route::post('/upload', [\App\Http\Controllers\admin\MediaController::class, 'upload'])->name('upload.public');

        Route::post('/logout', [\App\Http\Controllers\admin\auth\LogoutController::class, 'logout'])->name('logout');

    });
});
