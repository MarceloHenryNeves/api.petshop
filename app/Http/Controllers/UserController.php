<?php

namespace App\Http\Controllers;

use App\Http\Services\User\Pets;

class UserController extends Controller
{
    public function pets(Pets $service)
    {
        return $service->execute();
    }
}
