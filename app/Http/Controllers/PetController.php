<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pet\StorePetRequest;
use App\Services\Pet\Store;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function store(StorePetRequest $request, Store $service)
    {
        return $service->execute($request);
    }
}
