<?php

namespace Database\Seeders;

use App\Models\SchoolGrade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            [
                'name' => ['ar' => "المرحلة الابتدائيه", "en" => "Primary School"]
            ],
            [
                'name' => ['ar' => "المرحلة الاعداديه", "en" => "Middle School"]
            ],
            [
                'name' => ['ar' => "المرحلة الثانويه", "en" => "Secondary School"]
            ],
        ];
        DB::table('school_grades')->delete();

        foreach ($grades as $grade) {
            SchoolGrade::create([
                'name' => $grade['name']
            ]);
        }
    }
}
