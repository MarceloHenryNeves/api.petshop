<?php

namespace App\Http\Services\Services;

use App\Http\Repositories\ServicesRepository;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;

class All
{
    private ServicesRepository $repository;

    public function __construct(ServicesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        $services = $this->repository->all();

        if(!$services){
            return new ApiErrorResponse('No Service found', 404);
        }

        $services = $services->transform(function ($service) {
            $data['id'] = $service->id;
            $data['title'] = $service->title;

            if($service->observation) {
                $data['observation'] = $service->observation;
            }

            if($service->path_background){
                $data['path_background'] = $service->path_background;
            }

            return $data;
        });

        return new ApiSuccessResponse($services, 'successful', 200);
    }
}
