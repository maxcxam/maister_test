<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/refresh', function () {
    Artisan::call('migrate:fresh --seed');
    return "Database has been refreshed";
});

