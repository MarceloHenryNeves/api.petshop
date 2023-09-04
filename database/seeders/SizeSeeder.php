<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            1 => "Toy",
            2 => "Pequeno",
            3 => "Médio",
            4 => "Grande",
            5 => "Gigante",
            6 => "Monstro",
        ];

        array_map(function($size){
            DB::table('sizes')->insert([
                "size" => $size,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }, $sizes);
    }
}
