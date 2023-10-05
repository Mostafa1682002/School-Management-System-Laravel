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
        Schema::create('myparents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');


            //Informations Father
            $table->string('name_father');
            $table->string('national_id_father')->unique();
            $table->string('passport_id_father')->unique();
            $table->string('job_father');
            $table->string('phone_father')->unique();
            $table->string('address_father');
            $table->foreignId('nationality_father_id')->constrained('nationalities')->cascadeOnDelete();
            $table->foreignId('religion_father_id')->constrained('religions')->cascadeOnDelete();
            $table->foreignId('type_blood_father_id')->constrained('type__bloods')->cascadeOnDelete();


            //Informations Mother
            $table->string('name_mother');
            $table->string('national_id_mother')->unique();
            $table->string('passport_id_mother')->unique();
            $table->string('job_mother');
            $table->string('phone_mother')->unique();
            $table->string('address_mother');
            $table->foreignId('nationality_mother_id')->constrained('nationalities')->cascadeOnDelete();
            $table->foreignId('religion_mother_id')->constrained('religions')->cascadeOnDelete();
            $table->foreignId('type_blood_mother_id')->constrained('type__bloods')->cascadeOnDelete();


            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('myparents');
    }
};
