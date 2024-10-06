<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('storage-link', function (){
    Artisan::call('storage:link');
    echo 'ok';
});
