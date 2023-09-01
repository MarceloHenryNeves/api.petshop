<?php

namespace App\Services;

use App\Http\Responses\ApiSuccessResponse;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class ServiceBase
{

    protected function userExist($clientId){
        $user = User::where('clientId', $clientId)->first();

        if($user){
            return true;
        }

        return false;
    }


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
