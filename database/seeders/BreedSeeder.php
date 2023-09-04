<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $breeds = [
            'Vira-Lata', 'Poodle', 'Labrador Retriever', 'Bulldog Francês', 'Golden Retriever', 'Shih Tzu',
            'Yorkshire Terrier', 'Boxer', 'Dachshund', 'Rottweiler', 'Beagle', 'Maltese', 'Lhasa Apso',
            'Chihuahua', 'Border Collie', 'Cocker Spaniel', 'Pug', 'Basset Hound', 'Chow Chow', 'Pinscher',
            'Doberman', 'Akita', 'Bull Terrier', 'Pastor Alemão', 'São Bernardo', 'Bulldog Inglês', 'Shiba Inu',
            'Dálmata', 'Bernese Mountain Dog', 'Staffordshire Bull Terrier', 'Bichon Frisé', 'Schnauzer Miniatura',
            'Pomeranian', 'Boston Terrier', 'Pequinês', 'Shetland Sheepdog', 'Greyhound', 'Galgo Espanhol',
            'Poodle Standard', 'Cane Corso', 'Cão de Crista Chinês', 'Mastim Napolitano', 'Dogue de Bordeaux',
            'Cão de São Bernardo', 'Cão de Castro Laboreiro', 'Setter Inglês', 'Setter Irlandês', 'Bulldog Americano',
            'Boiadeiro Bernês', 'Papillon'
        ];

        $breedData = array_map(function ($breed) {
            return [
                'breed' => $breed,
                'specie_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $breeds);

        DB::table('breeds')->insert($breedData);
    }
}
