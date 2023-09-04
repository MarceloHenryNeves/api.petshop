<?php

namespace App\Services\Pet;

use App\Http\Requests\Pet\StorePetRequest;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Pet\Pet;

class Store
{
    public function execute(StorePetRequest $request)
    {
        $requestvalidated = $request->validated();

        $pet = Pet::create(array_merge($requestvalidated, ['owner_id' => auth()->user()->id]));

        if($pet){
            return new ApiErrorResponse('it was not possible to register your pet', 502);
        }

        return new ApiSuccessResponse($pet, 'Successfully registered pet', 200);
    }
}
