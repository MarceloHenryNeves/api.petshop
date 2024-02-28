<?php

namespace App\Http\Services\Pet;

use App\Http\Repositories\PetsRepository;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;

class Index
{
    protected $petRepository;

    public function __construct(PetsRepository $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    public function execute($id)
    {
        $pet = $this->petRepository->selectFind($id);

        if(!$pet){
            return new ApiErrorResponse('could not find the pet', 404);
        }

        return new ApiSuccessResponse($pet, 'Successfully', 200);
    }
}
