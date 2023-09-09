<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = [
            ['en' => 'Male', "ar" => "ذكر"],
            ['en' => 'Female', "ar" => "انثي"]
        ];

        DB::table('genders')->delete();
        foreach ($genders as $gender) {
            Gender::create(['name_gender' => $gender]);
        }
    }
}
