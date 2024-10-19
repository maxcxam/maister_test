<?php

use App\Http\Controllers\Bitrix\Apps\MainAppController;
use Illuminate\Support\Facades\Route;

Route::get('/bitrix/install', [MainAppController::class, 'install'])->name('bitrix.main-app.install');
Route::any('/bitrix/main-app/handler', [MainAppController::class, 'handler'])->name('bitrix.main-app.handler');



