<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSubserviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicesSubservices = [
            [
                "id" => 1,
                "service_id" => 1,
                "subservice_id" => 1,
                "subservice_description" => "Corte de unhas",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 2,
                "service_id" => 1,
                "subservice_id" => 2,
                "subservice_description" => "Tosa higiênica",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 3,
                "service_id" => 1,
                "subservice_id" => 3,
                "subservice_description" => "Limpeza de ouvidos",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 4,
                "service_id" => 2,
                "subservice_id" => 1,
                "subservice_description" => "Corte de unhas",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 5,
                "service_id" => 2,
                "subservice_id" => 2,
                "subservice_description" => "Tosa higiênica",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 6,
                "service_id" => 2,
                "subservice_id" => 3,
                "subservice_description" => "Limpeza de ouvidos",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 7,
                "service_id" => 2,
                "subservice_id" => 4,
                "subservice_description" => "Corte de unhas",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 8,
                "service_id" => 3,
                "subservice_id" => 5,
                "subservice_description" => "C/toalhas descartáveis shampoo hipoalergênicos materiais esterilizados ozônio para aliviar a pele do seu pet juntamente com shampoo
                indicados pelos veterinários de sua confiança tudo pensado para que o seu pet tenha um banho de
                qualidade esse banho e especialmente elaborado para pets que tenham a predisposição a contatos com produtos que possam agredir a sua pele",
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];

        array_map(function($data){
            DB::table('services_subservices')->insert($data);
        }, $servicesSubservices);
    }
}
