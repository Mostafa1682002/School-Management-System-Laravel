<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('gender_id')->constrained('genders', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('nationalitie_id')->constrained('nationalities', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('blood_id')->constrained('type__bloods', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('date_birth');
            $table->foreignId('grade_id')->constrained('school_grades', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('class_id')->constrained('classes', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('section_id')->constrained('sections', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('parent_id')->constrained('myparents', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('academic_year');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
