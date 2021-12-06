<?php

use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Auth\TeacherLoginController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\ParentLoginController;
use App\Http\Controllers\Parent\ParentController;
use App\Models\Grade;
use App\Models\User;
use App\Models\Teacher;
use App\Models\News;



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
//        Route::resource('/settings' , 'App\Http\Controllers\SuperAdmin\SchoolSettingController');
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
        Route::get('/index' , 'App\Http\Controllers\Admin\AdminController@index')->name('index');

        Route::resource('/terms' , 'App\Http\Controllers\Admin\TermController');
        Route::resource('/parents' , 'App\Http\Controllers\Admin\ParentController');
        Route::resource('/subjects' , 'App\Http\Controllers\Admin\SubjectController');
        Route::resource('/grades' , 'App\Http\Controllers\Admin\GradeController');
        Route::resource('/students' , 'App\Http\Controllers\Admin\StudentController');
        Route::resource('/teachers' , 'App\Http\Controllers\Admin\TeacherController');
        Route::resource('/schedules' , 'App\Http\Controllers\Admin\ScheduleController');
        Route::resource('/teacher_schedules' , 'App\Http\Controllers\Admin\TeacherScheduleController');
        Route::resource('/news' , 'App\Http\Controllers\Admin\NewsController');
        Route::resource('/grade-news' , 'App\Http\Controllers\Admin\StudentNewsController');
        Route::resource('/admins' , 'App\Http\Controllers\Admin\AdminsController');
        Route::resource('/tracking' , 'App\Http\Controllers\Admin\TrackingController');
        Route::resource('/school/settings' , 'App\Http\Controllers\Admin\SchoolSettingController');
        Route::resource('/notifications' , 'App\Http\Controllers\Admin\NotificationController');
        Route::resource('/all/students' , 'App\Http\Controllers\Admin\AllStudentController');
        Route::get('/all/students/{term}/{grade}' , 'App\Http\Controllers\Admin\AllStudentController@showStudents');


        Route::get('/news', 'App\Http\Controllers\Admin\NewsController@search')->name('news');
        Route::get('/terms', 'App\Http\Controllers\Admin\TermController@search')->name('terms');
        Route::get('/grades', 'App\Http\Controllers\Admin\GradeController@search')->name('grades');
        Route::get('/admins', 'App\Http\Controllers\Admin\AdminsController@search')->name('admins');
        Route::get('/parents', 'App\Http\Controllers\Admin\ParentController@search')->name('parents');
        Route::get('/schedules', 'App\Http\Controllers\Admin\ScheduleController@search')->name('schedules');
        Route::get('/students', 'App\Http\Controllers\Admin\StudentController@search')->name('students');
        Route::get('/grade-news', 'App\Http\Controllers\Admin\StudentNewsController@search')->name('grade-news');
//        Route::get('/subjects', 'App\Http\Controllers\Admin\SubjectController@search')->name('subjects');
        Route::get('/teachers', 'App\Http\Controllers\Admin\TeacherController@search')->name('teachers');
        Route::get('/tracking', 'App\Http\Controllers\Admin\TrackingController@search')->name('tracking');

        Route::post('/logout',[AdminLoginController::class,'logout'])->name('logout');
    });

});





Route::view('/','welcome')->name('login');


Route::prefix('teacher')->name('teacher.')->group(function(){

    Route::middleware(['guest:teacher'])->group(function(){
        //Route::view('/login','pages.teacher.login')->name('login');
        //   Route::post('/check',[TeacherController::class,'check'])->name('check');
        Route::post('/login', 'App\Http\Controllers\Auth\TeacherLoginController@login')->name('login');

    });

    Route::middleware(['auth:teacher'])->group(function(){
        // Route::view('/index' , 'pages.teacher.index')->name('index');
        Route::get('/index', 'App\Http\Controllers\Teacher\TeacherController@index' )->name('index');

        Route::resource('/schedule' , 'App\Http\Controllers\Teacher\ScheduleController');
        Route::resource('/lesson' , 'App\Http\Controllers\Teacher\LessonController');
        Route::get('/lesson/{grade}/{subject}' , 'App\Http\Controllers\Teacher\LessonController@getLessons');
        Route::resource('/my/students' , 'App\Http\Controllers\Teacher\MyStudentController');
        Route::get('/my_students/{grade_id}' , 'App\Http\Controllers\Teacher\MyStudentController@getSubjects');
        Route::post('/my_students' , 'App\Http\Controllers\Teacher\MyStudentController@getStudents');
        Route::resource('/exam' , 'App\Http\Controllers\Teacher\ExamController');
        Route::resource('/mark' , 'App\Http\Controllers\Teacher\MarkController');
        Route::get('/mark/{grade}/{subject}/{term}' , 'App\Http\Controllers\Teacher\MarkController@showMarks');
        Route::resource('/assignment' , 'App\Http\Controllers\Teacher\AssignmentController');
        Route::get('/get_assignment_subjects/{grade}' , 'App\Http\Controllers\Teacher\AssignmentController@getSubjects');
        Route::get('/get_assignments/{grade}/{subject}' , 'App\Http\Controllers\Teacher\AssignmentController@getAssignments');
        Route::resource('/attendance' , 'App\Http\Controllers\Teacher\AttendanceController');
//        Route::get('/attendance/{id}' , 'App\Http\Controllers\Teacher\AttendanceController');
        Route::get('/get_teacher_attendance/{grade}/{subject}' , 'App\Http\Controllers\Teacher\AttendanceController@showAttendance');
        Route::resource('/news' , 'App\Http\Controllers\Teacher\NewsController');
        Route::resource('/question','App\Http\Controllers\Teacher\QuestionController');

        Route::resource('/profile','App\Http\Controllers\Teacher\ProfileController');
        Route::resource('/notifications','App\Http\Controllers\Teacher\NotificationController');


        Route::get('/assignments', 'App\Http\Controllers\Teacher\AssignmentController@search')->name('assignments');


        Route::post('/logout',[TeacherLoginController::class,'logout'])->name('logout');
    });

});




//Route::prefix('user')->name('user.')->group(function () {

//    Route::middleware(['guest:web'])->group(function(){
//        Route::post('/login', 'App\Http\Controllers\Auth\UserLoginController@login')->name('login');
//
//    });


    Route::middleware(['auth:web'])->group(function(){
        Route::get('/index', 'App\Http\Controllers\User\UserController@index' )->name('index');

        Route::resource('/schedule' , 'App\Http\Controllers\User\ScheduleController');
        Route::resource('/today/work' , 'App\Http\Controllers\User\TodayWorkController');
        Route::resource('/lesson' , 'App\Http\Controllers\User\LessonController');
        Route::resource('/exam' , 'App\Http\Controllers\User\ExamController');
        Route::resource('/mark' , 'App\Http\Controllers\User\MarkController');
        Route::resource('/assignment' , 'App\Http\Controllers\User\AssignmentController');
        Route::resource('/attendance' , 'App\Http\Controllers\User\AttendanceController');
        Route::get('/get_attendance/{term}/{subject}' , 'App\Http\Controllers\User\AttendanceController@showAttendance');
        Route::resource('/news' , 'App\Http\Controllers\User\NewsController');
        Route::resource('/grade-news' , 'App\Http\Controllers\User\StudentNewsController');

        Route::resource('/profile','App\Http\Controllers\User\ProfileController');
        Route::resource('/notifications','App\Http\Controllers\User\NotificationController');


//        Route::post('/logout',[UserLoginController::class,'logout'])->name('logout');
    });

//});










Route::prefix('parent')->name('parent.')->group(function () {

    Route::middleware(['guest:parent'])->group(function(){
        Route::post('/login', 'App\Http\Controllers\Auth\ParentLoginController@login')->name('login');

    });


    Route::middleware(['auth:parent'])->group(function(){
        Route::post('/choose', 'App\Http\Controllers\Parent\ParentController@chooseStudent');
        Route::get('/choose-student', 'App\Http\Controllers\Parent\ParentController@create');
        Route::resource('/index' , 'App\Http\Controllers\Parent\ParentController');

        Route::resource('/schedule' , 'App\Http\Controllers\Parent\ScheduleController');
        Route::resource('/today/work' , 'App\Http\Controllers\Parent\TodayWorkController');
        Route::resource('/lesson' , 'App\Http\Controllers\Parent\LessonController');
        Route::resource('/exam' , 'App\Http\Controllers\Parent\ExamController');
        Route::resource('/mark' , 'App\Http\Controllers\Parent\MarkController');
        Route::resource('/assignment' , 'App\Http\Controllers\Parent\AssignmentController');
        Route::resource('/attendance' , 'App\Http\Controllers\Parent\AttendanceController');
        Route::get('/get_attendance/{term}/{subject}' , 'App\Http\Controllers\Parent\AttendanceController@showAttendance');
        Route::resource('/news' , 'App\Http\Controllers\Parent\NewsController');
        Route::resource('/grade-news' , 'App\Http\Controllers\Parent\StudentNewsController');

        Route::resource('/profile','App\Http\Controllers\Parent\ProfileController');
        Route::resource('/notifications','App\Http\Controllers\Parent\NotificationController');


        Route::post('/logout',[ParentLoginController::class,'logout'])->name('logout');
    });

});



