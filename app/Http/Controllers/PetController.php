<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pet\StorePetRequest;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Pet\Pet;
use App\Services\Pet\All;
use App\Services\Pet\Index;
use App\Services\Pet\Store;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function store(StorePetRequest $request, Store $service)
    {
        return $service->execute($request);
    }

    public function index($id, Index $service)
    {
      return $service->execute($id);
    }

    public function all(All $service)
    {
        return $service->execute();
    }
}
