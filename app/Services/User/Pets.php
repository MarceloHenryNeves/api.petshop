<?php

namespace App\Services\User;

use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Pet\Pet;

class Pets
{
    public function execute()
    {
        $pets = Pet::select(
            'pets.name',
            'pets.date_of_birth',
            'pets.age',
            'pets.weight',
            'pets.sex',
            'pets.is_allergic',
            'users.name as owner_name',
            'users.email as owner_email',
            'users.cpf as owner_cpf',
            'species.specie as specie',
            'breeds.breed as breed'
        )->join('users', 'users.id', '=', 'pets.owner_id')
            ->join('species', 'species.id', '=', 'pets.specie_id')
            ->join('breeds', 'breeds.id', 'pets.breed_id')
            ->where("owner_id", auth()->user()->id)->get();

        if(!$pets){
            return new ApiErrorResponse('No pet found', 404);
        }

        return new ApiSuccessResponse($pets, 'successful', 200);
    }
}
