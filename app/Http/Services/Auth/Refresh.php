<?php

namespace App\Http\Services\Auth;

use App\Http\Services\ServiceBase;

class Refresh extends ServiceBase
{
    public function execute()
    {
       return $this->respondWithToken(auth()->refresh());
    }
}
