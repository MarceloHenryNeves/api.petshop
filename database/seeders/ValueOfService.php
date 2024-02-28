<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValueOfService extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
           "id" => 1,
           "service_id" => 1,
           "size_id" => 1,
       ];
    }
}
