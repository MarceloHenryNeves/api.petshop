<?php

namespace App\Http\Services\Services;

use App\Http\Repositories\ServicesRepository;
use App\Http\Requests\Service\StoreServiceRequest;

class Store extends AbstractServices
{
    public $serviceRepository;

    public function __construct(ServicesRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function execute(StoreServiceRequest $request)
    {

    }
}
