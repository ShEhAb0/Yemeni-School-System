<?php

use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Admin\AdminController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



//
//Route::prefix('superAdmin')->name('superAdmin.')->group(function () {
//
//    Route::middleware(['guest:superAdmin'])->group(function(){
//        Route::view('/login' , 'pages.super-admin.login')->name('login');
//        Route::post('/check',[SuperAdminController::class,'check'])->name('check');
//    });
//
//
//    Route::middleware(['auth:superAdmin'])->group(function(){
//        Route::view('/index' , 'pages.super-admin.index')->name('index');
//        Route::resource('/parents' , 'App\Http\Controllers\SuperAdmin\ParentController');
//        Route::resource('/subjects' , 'App\Http\Controllers\SuperAdmin\SubjectController');
//        Route::resource('/grades' , 'App\Http\Controllers\SuperAdmin\GradeController');
//        Route::resource('/students' , 'App\Http\Controllers\SuperAdmin\StudentController');
//        Route::resource('/teachers' , 'App\Http\Controllers\SuperAdmin\TeacherController');
//        Route::resource('/schedules' , 'App\Http\Controllers\SuperAdmin\ScheduleController');
//        Route::resource('/news' , 'App\Http\Controllers\SuperAdmin\NewsController');
//        Route::resource('/admins' , 'App\Http\Controllers\SuperAdmin\AdminController');
//        Route::resource('/tracking' , 'App\Http\Controllers\SuperAdmin\TrackingController');
//        Route::resource('/settings' , 'App\Http\Controllers\SuperAdmin\SettingController');
//
//
//
//        Route::post('/logout',[SuperAdminController::class,'logout'])->name('logout');
//    });
//
//});
//


Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin'])->group(function(){
        Route::get('/','App\Http\Controllers\Auth\AdminLoginController@showLoginForm')->name('login');
        Route::get('/login','App\Http\Controllers\Auth\AdminLoginController@showLoginForm')->name('login');
        Route::post('/login', 'App\Http\Controllers\Auth\AdminLoginController@login')->name('login');
//        Route::view('/' , 'pages.admin.login')->name('login');
//        Route::post('/check',[AdminController::class,'check'])->name('check');
    });


    Route::middleware(['auth:admin'])->group(function(){
        Route::view('/index' , 'pages.admin.index')->name('index');

        Route::resource('/terms' , 'App\Http\Controllers\Admin\TermController');
        Route::resource('/parents' , 'App\Http\Controllers\Admin\ParentController');
        Route::resource('/subjects' , 'App\Http\Controllers\Admin\SubjectController');
        Route::resource('/grades' , 'App\Http\Controllers\Admin\GradeController');
        Route::resource('/students' , 'App\Http\Controllers\Admin\StudentController');
        Route::resource('/teachers' , 'App\Http\Controllers\Admin\TeacherController');
        Route::resource('/schedules' , 'App\Http\Controllers\Admin\ScheduleController');
        Route::resource('/news' , 'App\Http\Controllers\Admin\NewsController');
        Route::resource('/admins' , 'App\Http\Controllers\Admin\AdminsController');
        Route::resource('/tracking' , 'App\Http\Controllers\Admin\TrackingController');
        Route::resource('/settings' , 'App\Http\Controllers\Admin\SettingController');


        Route::post('/logout',[AdminLoginController::class,'logout'])->name('logout');
    });

});

