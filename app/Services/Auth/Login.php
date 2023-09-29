<?php

namespace App\Services\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Responses\ApiErrorResponse;
use App\Services\ServiceBase;

class Login extends ServiceBase
{
    public function execute(LoginRequest $request)
    {
        $requestValidated = (object)$request->validated();

        $token = auth()->attempt([
            "clientId" => $this->hashClientId($requestValidated->cpf . '|' . getenv('APPLICATION_TOKEN')),
            "password" => $requestValidated->password
        ]);

        if (!$token) {
            return new ApiErrorResponse('Unauthorized', 401);
        }

        return $this->respondWithToken($token);
    }
}
