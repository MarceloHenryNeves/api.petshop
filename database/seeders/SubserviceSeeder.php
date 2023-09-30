<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubserviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subservices = [
            [
                "id" => 1,
                "description" => "Corte de unhas",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "id" => 2,
                "description" => "Tosa higiênica",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "id" => 3,
                "description" => "Limpeza de ouvidos",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "id" => 4,
                "description" => "hidratação com produtos de alta qualidade  tudo para deixar o seu pet com um pelo macio ao toque com um perfume inigualável",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "id" => 5,
                "description" => "C/toalhas descartáveis shampoo hipoalergênicos materiais esterilizados ozônio para aliviar a pele do seu pet juntamente com shampoo
                indicados pelos veterinários de sua confiança tudo pensado para que o seu pet tenha um banho de
                qualidade esse banho e especialmente elaborado para pets que tenham a predisposição a contatos com produtos que possam agredir a sua pele",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        array_map(function($sub){
            DB::table('subservices')->insert($sub);
        }, $subservices);
    }
}
