<?php

namespace Database\Seeders;

use App\Models\Classe;
use App\Models\SchoolGrade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clases = [
            [
                'class_name' => ['ar' => "الصف الاول", "en" => "First Classe"],
                'schoolgrade_id' => SchoolGrade::all()->unique()->random()->id,
            ],
            [
                'class_name' => ['ar' => "الصف الثاني", "en" => "Second Classe"],
                'schoolgrade_id' => SchoolGrade::all()->unique()->random()->id,
            ],
            [
                'class_name' => ['ar' => "الصف الثالث", "en" => "Third Classe"],
                'schoolgrade_id' => SchoolGrade::all()->unique()->random()->id,
            ],
            [
                'class_name' => ['ar' => "الصف الرابع", "en" => "Fourth Classe"],
                'schoolgrade_id' => SchoolGrade::all()->unique()->random()->id,
            ],
            [
                'class_name' => ['ar' => "الصف الخامس", "en" => "Fifith Classe"],
                'schoolgrade_id' => SchoolGrade::all()->unique()->random()->id,
            ],
            [
                'class_name' => ['ar' => "الصف السادس", "en" => "six Classe"],
                'schoolgrade_id' => SchoolGrade::all()->unique()->random()->id,
            ],
        ];


        DB::table('classes')->delete();
        foreach ($clases as $classe) {
            Classe::create([
                'class_name' => $classe['class_name'],
                'schoolgrade_id' => $classe['schoolgrade_id']
            ]);
        }
    }
}
