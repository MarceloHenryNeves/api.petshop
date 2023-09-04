<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dog = [
            "specie" => 'dog',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $cat = [
            "specie" => 'cat',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $species = [$dog, $cat];
        DB::table('species')->insert($species);
    }
}
