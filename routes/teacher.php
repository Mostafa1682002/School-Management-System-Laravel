<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Teacher\SectionController;
use App\Http\Controllers\Teacher\SubjectController;
use App\Http\Controllers\Teacher\StudentController;
use App\Http\Controllers\Teacher\ExamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::group(['prefix'=>"teacher",'as'=>'teacher','middleware'=>"auth:teacher"],function (){
            //Dashboard
            Route::view('/dashboard','Teachers.pages.dashboard')->name('.dashboard');
            //Sections
            Route::get('sections',[SectionController::class,'index'])->name('.sections');
            //Subjects
            Route::get('subjects',[SubjectController::class,'index'])->name('.subjects');
            //Students
            Route::get('students',[StudentController::class,'index'])->name('.students');
            //Students
            Route::get('exams',[ExamController::class,'index'])->name('.exams');
            Route::group(['prefix'=>'questions','controller'=>\App\Http\Controllers\Teacher\QuestionController::class],function (){
                Route::get('/show/{id}','show')->name('.questions.show');
                Route::get('/create/{id}','create')->name('.questions.create');
                Route::post('/store','store')->name('.questions.store');
                Route::get('/edit/{id}','edite')->name('.questions.edite');
                Route::post('/update/{id}','update')->name('.questions.update');
            });
            Route::fallback(function (){
                return redirect('teacher/dashboard');
            });
        });

    }
);
