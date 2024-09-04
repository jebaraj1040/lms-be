<?php

use Hmvc\Course\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
*/

Route::apiResource('course',CourseController::class)->names('course');
Route::post('courseStatusList',[CourseController::class,'courseStatusList'])->name('courseStatusList');
Route::post('inprogress',[CourseController::class,'inprogress'])->name('inprogress');
Route::post('completed',[CourseController::class,'completed'])->name('completed');
Route::post('upcoming',[CourseController::class,'upcoming'])->name('upcoming');
Route::post('course_sort',[CourseController::class,'course_sort'])->name('course_sort');