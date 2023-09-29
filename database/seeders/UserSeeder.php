<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "name" => $this->encrypt('Marcelo das Neves'),
            "clientId" => $this->hashClientId(),
            "email" => $this->encrypt('marcelohenry2016@gmail.com'),
            "cpf" => $this->encrypt('05224908086'),
            "password" => Hash::make('marcelo123'),
            "phone" => $this->encrypt('(51)99768-1399'),
            "type" => 'CLIENT',
            "date_of_birth" =>  null,
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }

    private function encrypt($data)
    {
        return Crypt::encrypt($data);
    }

    private function hashClientId(){
        $hash = "05224908086" . "|" . getenv('APPLICATION_TOKEN');
        return hash('sha256', $hash);
    }
}
