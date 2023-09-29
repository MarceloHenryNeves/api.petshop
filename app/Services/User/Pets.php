<?php

namespace App\Services\User;

use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Pet\Pet;
use App\Services\ServiceBase;

class Pets extends ServiceBase
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
            'species.specie as specie',
            'breeds.breed as breed'
        )->join('users', 'users.id', '=', 'pets.owner_id')
            ->join('species', 'species.id', '=', 'pets.specie_id')
            ->join('breeds', 'breeds.id', 'pets.breed_id')
            ->where("owner_id", auth()->user()->id)->get();

        if(!$pets){
            return new ApiErrorResponse('No pet found', 404);
        }

        $pets->map(function($pet){
            $pet->owner_name = $this->decrypt($pet->owner_name);
        });

        return new ApiSuccessResponse($pets, 'successful', 200);
    }
}
