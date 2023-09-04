<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoatTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coat_types = [
            1 =>'Encaracolada',
            2 => 'Frisada',
            3 => 'Lisa',
            4 => 'Não sei',
            5 => 'Ondulada',
            6 => 'Pelagem Dupla/Subpelo',
            7 => 'Pelagem peculiar',
            8 => 'Textura dura',
            9 => 'Fluffy',
            10 => 'Encordoado'
        ];

        array_map(function($type){
            DB::table('coat_types')->insert([
                "coat_type" => $type,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }, $coat_types);
    }
}
