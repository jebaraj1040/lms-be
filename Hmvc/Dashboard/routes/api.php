<?php

use Hmvc\Dashboard\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::apiResource('dashboard', DashboardController::class)->names('dashboard');
Route::get('course-filter', [DashboardController::class, 'getCourseList'])->name('course-filter');
Route::get('department-list', [DashboardController::class, 'getDepartmentList'])->name('department-list');
Route::get('course-list', [DashboardController::class, 'getCourseList'])->name('course-list');

// Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {

// });
