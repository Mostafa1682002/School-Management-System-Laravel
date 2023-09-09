<?php

namespace App\Providers;

use App\Interfaces\AttendanceRepositryInterface;
use App\Interfaces\ExamRepositryInterface;
use App\Interfaces\FeesInvoiceRepositryInterface;
use App\Interfaces\FeesRepositryInterface;
use App\Interfaces\GraduatedRepositryInterface;
use App\Interfaces\OnlineClasseRepositryInterface;
use App\Interfaces\PromotionRepositryInterface;
use App\Interfaces\QuestionRepositryInterface;
use App\Interfaces\StudentAccountRepositryInterface;
use App\Interfaces\StudentRepositryInterface;
use App\Interfaces\SubjectRepositryInterface;
use App\Interfaces\TeacherRepositryInterface;
use App\Repositry\AttendanceRepositry;
use App\Repositry\ExamRepositry;
use App\Repositry\FeesInvoiceRepositry;
use App\Repositry\FeesRepositry;
use App\Repositry\GraduatedRepositry;
use App\Repositry\OnlineClasseRepositry;
use App\Repositry\PromotionRepositry;
use App\Repositry\QuestionRepositry;
use App\Repositry\StudentAccountRepositry;
use App\Repositry\StudentRepositry;
use App\Repositry\SubjectRepositry;
use App\Repositry\TeacherRepositry;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TeacherRepositryInterface::class, TeacherRepositry::class);
        $this->app->bind(StudentRepositryInterface::class, StudentRepositry::class);
        $this->app->bind(PromotionRepositryInterface::class, PromotionRepositry::class);
        $this->app->bind(GraduatedRepositryInterface::class, GraduatedRepositry::class);
        $this->app->bind(FeesRepositryInterface::class, FeesRepositry::class);
        $this->app->bind(FeesInvoiceRepositryInterface::class, FeesInvoiceRepositry::class);
        $this->app->bind(StudentAccountRepositryInterface::class, StudentAccountRepositry::class);
        $this->app->bind(AttendanceRepositryInterface::class, AttendanceRepositry::class);
        $this->app->bind(SubjectRepositryInterface::class, SubjectRepositry::class);
        $this->app->bind(ExamRepositryInterface::class, ExamRepositry::class);
        $this->app->bind(QuestionRepositryInterface::class, QuestionRepositry::class);
        $this->app->bind(OnlineClasseRepositryInterface::class, OnlineClasseRepositry::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
