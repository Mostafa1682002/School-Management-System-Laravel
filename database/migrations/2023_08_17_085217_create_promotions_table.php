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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->foreignId('from_grade')->constrained('school_grades')->cascadeOnDelete();
            $table->foreignId('from_classe')->constrained('classes')->cascadeOnDelete();
            $table->foreignId('from_section')->constrained('sections')->cascadeOnDelete();
            $table->integer('from_academic_year');

            $table->foreignId('to_grade')->constrained('school_grades')->cascadeOnDelete();
            $table->foreignId('to_classe')->constrained('classes')->cascadeOnDelete();
            $table->foreignId('to_section')->constrained('sections')->cascadeOnDelete();
            $table->integer('to_academic_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
