<?php

namespace App\Services\Pet;

use App\Http\Repositories\PetsRepository;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Pet\Pet;

class All
{
    protected $petRepository;

    public function __construct(PetsRepository $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    public function execute()
    {
        $pets = $this->petRepository->selectAll();

        if(!$pets){
            return new ApiErrorResponse('No pet found', 404);
        }

        return new ApiSuccessResponse($pets, 'successful', 200);
    }
}
