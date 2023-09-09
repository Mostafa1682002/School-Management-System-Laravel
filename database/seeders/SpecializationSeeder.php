<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializations = [
            ['en' => "Arabic", "ar" => "عربي"],
            ['en' => "English", "ar" => "انجليزي"]
        ];

        DB::table('specializations')->delete();

        foreach ($specializations as $specialization) {
            Specialization::create([
                'name_specializ' => $specialization
            ]);
        }
    }
}
