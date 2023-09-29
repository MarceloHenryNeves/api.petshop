<?php

namespace App\Http\Controllers;

use App\Services\User\Pets;

class UserController extends Controller
{
    public function pets(Pets $service)
    {
        return $service->execute();
    }
}
