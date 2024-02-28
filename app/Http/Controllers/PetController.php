<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pet\StorePetRequest;
use App\Http\Services\Pet\All;
use App\Http\Services\Pet\Index;
use App\Http\Services\Pet\Store;

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
