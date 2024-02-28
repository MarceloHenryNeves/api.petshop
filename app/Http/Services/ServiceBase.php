<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Crypt;

class   ServiceBase
{


    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }

    protected function encrypt($data)
    {
        return Crypt::encrypt($data);
    }

    protected function decrypt($data)
    {
        return Crypt::decrypt($data);
    }

    protected function hashClientId($data){
        return hash('sha256', $data);
    }
}
