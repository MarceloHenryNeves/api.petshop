<?php

namespace App\Services\User;

use App\Http\Repositories\UserRepository;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Pet\Pet;
use App\Models\User;
use App\Services\ServiceBase;

class Pets extends ServiceBase
{
    protected $userRepository;

    public function construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute()
    {
        $pets = $this->userRepository->pets();

        if(!$pets){
            return new ApiErrorResponse('No pet found', 404);
        }

        $pets->map(function($pet){
            $pet->owner_name = $this->decrypt($pet->owner_name);
        });

        return new ApiSuccessResponse($pets, 'successful', 200);
    }
}
