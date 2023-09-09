<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FeeseController;
use App\Http\Controllers\FeesInvoiceController;
use App\Http\Controllers\GraduatedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OnlineClasseController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SchoolGradeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentAccountController;
use App\Http\Controllers\StudentAttachmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    function () { //...

        Route::get('/', function () {
            return view('auth.login');
        })->middleware('guest');


        Auth::routes();

        Route::group(['middleware' => ['auth']], function () {
            Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
            Route::resource('schoolGrade', SchoolGradeController::class);
            Route::resource('classes', ClasseController::class);
            Route::delete('deleteSelect', [ClasseController::class, 'deleteSelect'])->name('classes.deleteSelect');
            Route::resource('section', SectionController::class);
            Route::get('getclass/{id}', [SectionController::class, 'getClass'])->name('getclass');
            Route::get('getSections/{id}', [SectionController::class, 'getSections'])->name('getSections');
            Route::view('add_parent', 'Myparents.form_add_parent')->name('add_parent');
            Route::resource('teacher', TeacherController::class);
            //Students
            Route::resource('student', StudentController::class);
            Route::resource('studentAttachment', StudentAttachmentController::class);
            Route::get('downloadStudentAttachment/{id}/{name}', [StudentAttachmentController::class, 'downloadStudentAttachment'])->name('downloadStudentAttachment');
            //Promotions
            Route::resource('promotion', PromotionController::class);
            Route::delete('promotion/{id}/{stu_id}', [PromotionController::class, 'destroyOne'])->name('promotion.destroyOne');
            //Graduates
            Route::resource('graduated', GraduatedController::class);
            //Fess
            Route::resource('feese', FeeseController::class);
            //Fess Invoice
            Route::resource('feese_invoice', FeesInvoiceController::class);
            Route::get('getAmountFeese/{id}', [FeesInvoiceController::class, 'getAmountFeese'])->name('getAmountFeese');
            //Student Accounts
            Route::resource('student_account', StudentAccountController::class);
            // Attendane
            Route::resource('attendance', AttendanceController::class);
            //Subjects
            Route::resource('subject', SubjectController::class);
            //Exams
            Route::resource('exam', ExamController::class);
            Route::get('getsubject/{id}', [ExamController::class, 'getsubject'])->name('getsubject');
            //Questions
            Route::resource('questions', QuestionController::class);
            // Online Classes
            Route::resource('online-classes', OnlineClasseController::class);
        });
    }
);
