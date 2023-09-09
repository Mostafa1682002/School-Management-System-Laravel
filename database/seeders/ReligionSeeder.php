<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $religions = [
            [
                'en' => "Muslim",
                'ar' => "مسلم"
            ],
            [
                'en' => "Christian",
                'ar' => "مسيحي"
            ],
        ];
        DB::table('religions')->delete();
        foreach ($religions as $religion) {
            Religion::create(
                ['religion_name' => $religion]
            );
        }
    }
}
