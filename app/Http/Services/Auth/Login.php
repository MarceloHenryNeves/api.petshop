<?php

namespace App\Http\Services\Auth;

use App\Http\Repositories\UserRepository;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Http\Services\ServiceBase;

class Login extends ServiceBase
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(LoginRequest $request)
    {
        $requestValidated = (object)$request->validated();

        $token = auth()->attempt([
            "clientId" => $this->hashClientId($requestValidated->email . '|' . getenv('APPLICATION_TOKEN')),
            "password" => $requestValidated->password
        ]);

        if (!$token) {
            return new ApiErrorResponse('Unauthorized', 401);
        }


        $data['name'] = $this->decrypt(auth()->user()->name);
        $data['cpf'] = $this->decrypt(auth()->user()->cpf);
        $data['email'] = $this->decrypt(auth()->user()->email);
        $data['phone'] = $this->decrypt(auth()->user()->phone);
        $data['pets'] = $this->userRepository->pets();
        $token = $this->respondWithToken($token);

        return new ApiSuccessResponse(
            array_merge($data, ["token" => $token]),
            "User successfully logged in", 200);
    }
}
