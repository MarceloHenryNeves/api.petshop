<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pet\StorePetRequest;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Pet\Pet;
use App\Services\Pet\Get;
use App\Services\Pet\Store;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function store(StorePetRequest $request, Store $service)
    {
        return $service->execute($request);
    }

    public function index($id, Get $service)
    {
      return $service->execute($id);
    }

    public function petsOwner()
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
