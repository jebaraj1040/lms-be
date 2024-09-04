<?php

use Illuminate\Support\Facades\Route;
use Hmvc\Others\Http\Controllers\OthersController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
*/
// Route::apiResource('others', OthersController::class)->names('others');
Route::post('notification', [OthersController::class, 'notification'])->name('notification-list');