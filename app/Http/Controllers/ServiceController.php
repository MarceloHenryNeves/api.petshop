<?php

namespace App\Http\Controllers;

use App\Http\Requests\Service\StoreServiceRequest;
use App\Services\Services\Store;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function store(StoreServiceRequest $request, Store $service)
    {
        return;
    }
}
