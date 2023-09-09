<?php

namespace App\Services\Pet;

use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Pet\Pet;

class Get
{
    public function execute($id)
    {
        $pet = Pet::select(
            'pets.name',
            'pets.date_of_birth',
            'pets.age',
            'pets.weight',
            'pets.sex',
            'pets.is_allergic',
            'species.specie as specie',
            'breeds.breed as breed',
            'coats.coat as coat',
            'coat_types.coat_type as coat_type',
            'sizes.size as size'
        )->join('species', 'pets.specie_id', '=', 'species.id')
            ->join('coats', 'pets.coat_id', '=', 'coats.id')
            ->join('coat_types', 'pets.coat_type_id', '=', 'coat_types.id')
            ->join('breeds', 'pets.breed_id', '=', 'breeds.id')
            ->join('sizes', 'pets.size_id', '=', 'sizes.id')
            ->find($id);

        if(!$pet){
            return new ApiErrorResponse('could not find the pet', 404);
        }

        return new ApiSuccessResponse($pet, 'Successfully', 200);
    }
}
