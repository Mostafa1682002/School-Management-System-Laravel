<?php

namespace Database\Seeders;

use App\Models\Myparent;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Type_Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MyParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Myparent::create([
            "email" => "parent@gmailcom",
            "password" => Hash::make('123456'),
            "name_father" => ["ar" => "حسام", "en" => "Hossam"],
            "national_id_father" => 30208161600398,
            "passport_id_father" => 30208161600398,
            "job_father" => ['ar' => "معلم", "en" => "teacher"],
            "nationality_father_id" =>  Nationality::all()->unique()->random()->id,
            "type_blood_father_id" => Type_Blood::all()->unique()->random()->id,
            "religion_father_id" => Religion::all()->unique()->random()->id,
            "address_father" => "Mansoura",
            "phone_father" => '01064564850',
            //Mother
            "name_mother" => ["ar" => "ميرفت", "en" => "Mervat"],
            "national_id_mother" => 30208161600398,
            "passport_id_mother" => 30208161600398,
            "job_mother" => ['ar' => "معلمه", "en" => "teacher"],
            "nationality_mother_id" => Nationality::all()->unique()->random()->id,
            "type_blood_mother_id" => Type_Blood::all()->unique()->random()->id,
            "religion_mother_id" => Religion::all()->unique()->random()->id,
            "address_mother" => "Mansoura",
            "phone_mother" => '01064564850',
        ]);
    }
}
