<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\MailTemplateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize:clear');
    Artisan::call('view:clear');

    return 'cache cleared';
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::get('/', [AuthController::class, 'adminLogin'])->name('login');
        Route::get('/register', [AuthController::class, 'adminRegister'])->name('register');
        Route::post('/create-user', [AuthController::class, 'create'])->name('create');
        Route::post('/check', [AuthController::class, 'adminLoginPost'])->name('check');
    });

    // Route::group(['middleware' => ['role:admin,admin']], function () {
    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('courses', CourseController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('departments', DepartmentController::class);
        Route::resource('employees', EmployeeController::class);
        Route::resource('mail_templates', MailTemplateController::class);
        Route::get('/change-password', [AuthController::class, 'changePassword'])->name('change-password');
        Route::post('/get-category-list', [CategoryController::class, 'getCategory'])->name('categories.get-category-list');
        Route::post('/get-department-list', [DepartmentController::class, 'getDepartment'])->name('departments.get-department-list');
        Route::post('/get-course-list', [CourseController::class, 'getCourse'])->name('courses.get-course-list');
        Route::post('/get-employee-list', [EmployeeController::class, 'getEmployee'])->name('employees.get-employee-list');
        Route::post('/change-employee-status', [EmployeeController::class, 'changeStatus'])->name('employees.change-status');
        Route::post('/get-department-category-list', [EmployeeController::class, 'getCategoryByDepartment'])->name('employees.get-department-category-list');
        Route::post('/get-category-course-list', [EmployeeController::class, 'getCourseByCategory'])->name('employees.get-category-course-list');
        Route::post('/assign-course', [EmployeeController::class, 'assignCourse'])->name('employees.assign-course');
        // Route::get('/change-password/submit', [AuthController::class,'changePasswordSubmit'])->name('change-password');
        Route::get('/profile-update', [AuthController::class, 'profileUpdate'])->name('profile-update');
        Route::post('/profile-update/submit', [AuthController::class, 'profileupdateSubmit'])->name('update-profile');
    });
    // });
});
