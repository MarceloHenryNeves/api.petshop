<?php

namespace App\Services\Pet;

use App\Http\Repositories\PetsRepository;
use App\Http\Requests\Pet\StorePetRequest;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Pet\Pet;
use DateTime;

class Store
{
    protected $petRepository;

    public function __construct(PetsRepository $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    public function execute(StorePetRequest $request)
    {
        $requestValidated = $request->validated();

        if(array_key_exists('date_of_birth', $requestValidated))
        {
            $requestValidated['date_of_birth'] = (new DateTime($requestValidated['date_of_birth']))->format('d/m/Y');
        }

        $pet = $this->petRepository->create(array_merge($requestValidated, ['owner_id' => auth()->user()->id]));

        if(!$pet){
            return new ApiErrorResponse('it was not possible to register your pet', 502);
        }

        return new ApiSuccessResponse($pet, 'Successfully registered pet', 200);
    }
}
