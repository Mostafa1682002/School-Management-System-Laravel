<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $teachers = [
            [
                'email' => "most@gmail.com",
                'password' => "123456",
                'name_teacher' => ['ar' => "احمد", 'en' => "Ahmed"],
                "gender_id" => Gender::all()->unique()->random()->id,
                "specialization_id" => Specialization::all()->unique()->random()->id,
                'address' => "Mansoura",
            ],
            [
                'email' => "most2@gmail.com",
                'password' => "123456",
                'name_teacher' => ['ar' => "خالد", 'en' => "Khaled"],
                "gender_id" => Gender::all()->unique()->random()->id,
                "specialization_id" => Specialization::all()->unique()->random()->id,
                'address' => "Mansoura",
            ],
            [
                'email' => "most3@gmail.com",
                'password' => "123456",
                'name_teacher' => ['ar' => "محمد", 'en' => "Mohammed"],
                "gender_id" => Gender::all()->unique()->random()->id,
                "specialization_id" => Specialization::all()->unique()->random()->id,
                'address' => "Mansoura",
            ],
        ];

        foreach ($teachers as $teacher) {
            Teacher::create([
                "email" => $teacher['email'],
                "password" => Hash::make($teacher['password']),
                "name_teacher" => $teacher['name_teacher'],
                "gender_id" => $teacher['gender_id'],
                "specialization_id" => $teacher['specialization_id'],
                "address" => $teacher['address'],
            ]);
        }
    }
}
