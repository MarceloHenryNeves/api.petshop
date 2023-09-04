<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $short_coat = [
            "coat" => "Curto - 1 dedo",
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $medium_coat = [
            "coat" => "Médio - 3 dedos",
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $long_coat = [
            "coat" => "Longa - 5 dedos ou mais",
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $nothing_coat = [
            "coat" => "Não tem",
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $coats = [
            $short_coat,
            $medium_coat,
            $long_coat,
            $nothing_coat
        ];

        DB::table('coats')->insert($coats);
    }
}
