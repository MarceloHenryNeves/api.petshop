<?php

namespace App\Services\Auth;

use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Services\ServiceBase;

class UserLogged extends ServiceBase
{
    public function execute()
    {
        $user = auth()->user();

        if(!$user){
            return new ApiErrorresponse('Unable to retrieve user data',401);
        }

        $data['name'] = $this->decrypt($user->name);
        $data['cpf'] = $this->decrypt($user->cpf);
        $data['email'] = $this->decrypt($user->email);
        $data['phone'] = $this->decrypt($user->phone);

        return new ApiSuccessResponse($data);
    }
}
