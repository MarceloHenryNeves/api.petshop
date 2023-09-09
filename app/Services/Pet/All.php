<?php

namespace App\Services\Pet;

use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Pet\Pet;

class All
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
        )->get();

        if(!$pets){
            return new ApiErrorResponse('No pet found', 404);
        }

        return new ApiSuccessResponse($pets, 'successful', 200);
    }
}
