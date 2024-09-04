<?php

// use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CourseCategoryController;
use App\Http\Controllers\Api\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::post('register', [ApiController::class, 'register']);
Route::post('login', [ApiController::class, 'login']);

Route::group([
    'middleware' => ['auth:api'],
], function () {

    Route::get('profile', [ApiController::class, 'profile']);
    Route::get('refresh', [ApiController::class, 'refreshToken']);
    Route::get('logout', [ApiController::class, 'logout']);
    Route::resource('departments', DepartmentController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('coursecategory', CourseCategoryController::class);

});
