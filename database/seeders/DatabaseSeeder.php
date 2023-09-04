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
        $this->call(SpecieSeeder::class);
        $this->call(BreedSeeder::class);
        $this->call(CoatTypeSeeder::class);
        $this->call(CoatSeeder::class);
        $this->call(SizeSeeder::class);
    }
}
