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
        Schema::create('feese', function (Blueprint $table) {
            $table->id();
            $table->string('name_fees');
            $table->decimal('amount', 8, 2);
            $table->foreignId('school_grade_id')->constrained('school_grades')->cascadeOnDelete();
            $table->foreignId('classe_id')->constrained('classes')->cascadeOnDelete();
            $table->integer('academic_year');
            $table->integer('fees_type');
            $table->string('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feese');
    }
};
