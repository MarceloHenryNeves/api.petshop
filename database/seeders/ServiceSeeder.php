<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                "id" => 1,
                "title" => "Banho prêmio",
                "observation" => null,
                "path_background" => null,
                "created_at" => now(),
                "updated_at" => now()

            ],
            [
                "id" => 2,
                "title" => "Banho puro charme",
                "observation" => null,
                "path_background" => null,
                "created_at" => now(),
                "updated_at" => now()

            ],
            [
                "id" => 3,
                "title" => "Banho terapêutico em cachorros alérgicos",
                "observation" => null,
                "path_background" => null,
                "created_at" => now(),
                "updated_at" => now()

            ],
        ];

        array_map(fn($service) => DB::table('services')->insert($service), $services);
    }
}
