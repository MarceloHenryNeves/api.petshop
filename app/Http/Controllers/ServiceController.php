<?php

namespace App\Http\Controllers;

use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Services\Services\All;
use App\Http\Services\Services\Store;

class ServiceController extends Controller
{
    /*public function store(StoreServiceRequest $request, Store $service)
    {

    }*/

    public function all(All $service)
    {
        return $service->execute();
    }
}
