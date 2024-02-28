<?php

namespace App\Http\Repositories;

use App\Models\Services\Service;

class ServicesRepository extends AbstractRepository
{
    public $model;

    public function __construct(Service $model)
    {
        $this->model = $model;
    }

}
