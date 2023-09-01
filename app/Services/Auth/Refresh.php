<?php

namespace App\Services\Auth;

use App\Services\ServiceBase;

class Refresh extends ServiceBase
{
    public function execute()
    {
       return $this->respondWithToken(auth()->refresh());
    }
}
