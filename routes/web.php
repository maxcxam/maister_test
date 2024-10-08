<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/refresh', function () {
    Artisan::call('migrate:fresh --seed');
    return "Database has been refreshed";
});

Route::get('/users', [MainController::class, 'index']);
Route::get('/users/{id:user}', [MainController::class, 'user']);

