<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('terms')->delete();
        $terms = [
            ['name' => ['ar' => "الاول", 'en' => "The First"]],
            ['name' => ['ar' => "الثاني", 'en' => "The Second"]],
        ];
        foreach ($terms as $term) {
            Term::create([
                'name' => $term['name'],
            ]);
        }
    }
}
