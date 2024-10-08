<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('users.index');
});

Route::get('/refresh', function () {
    Artisan::call('migrate:fresh --seed');
    return redirect('/users')->with('success', 'Database refreshed');
})->name('refresh-database');

Route::get('/users', [MainController::class, 'index'])->name('users.index');
Route::get('/users/{user:id}', [MainController::class, 'user'])->name('users.show');
Route::get('/users/{user:id}/invoices', [MainController::class, 'invoices']);
Route::post('/users/{user:id}/invoices/create', [MainController::class, 'createInvoice'])->name('invoices.create');

Route::get('/invoices/{invoice:id}', [MainController::class, 'invoice'])->name('invoice');

