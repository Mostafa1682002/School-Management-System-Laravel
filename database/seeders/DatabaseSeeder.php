<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            GradeSeeder::class,
            ClasseSeeder::class,

            TypeBloodSeeder::class,
            NationalitySeeder::class,
            ReligionSeeder::class,
            GenderSeeder::class,
            SpecializationSeeder::class,

            MyParentSeeder::class,
            TeacherSeeder::class,

            TermSeeder::class,
        ]);
    }
}
