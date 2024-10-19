<?php

use App\Http\Controllers\Bitrix\Apps\MainAppController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::group(['excluded_middleware' => VerifyCsrfToken::class], function () {
    Route::any('/bitrix/install', [MainAppController::class, 'install'])->withoutMiddleware(VerifyCsrfToken::class)->name('install');
    Route::any('/bitrix/main-app/handler', [MainAppController::class, 'handler'])->withoutMiddleware(VerifyCsrfToken::class)->name('handler');
})->name('bitrix.main-app;




