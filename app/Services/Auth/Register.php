<?php

namespace App\Services\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\User;
use App\Services\ServiceBase;
use Illuminate\Support\Facades\Hash;

class Register extends ServiceBase
{
    public function execute(RegisterRequest $request)
    {

        $requestValidated = (object)$request->validated();

        $clientId = $this->hashClientId($requestValidated->cpf . '|' . $requestValidated->email);

        if($this->userExist($clientId, $requestValidated->email)){
            return new ApiErrorResponse('user already exist', 422);
        }

        $user = User::create([
            "name" => $this->encrypt($requestValidated->name),
            "clientId" => $clientId,
            "email" => $this->encrypt($requestValidated->email),
            "cpf" => $this->encrypt($requestValidated->cpf),
            "password" => Hash::make($requestValidated->password),
            "phone" => $this->encrypt($requestValidated->phone),
            "type" => $requestValidated->type,
            "date_of_birth" =>  $requestValidated->date_of_birth ?? null
        ]);

        if(!$user){
            return new ApiErrorResponse('could not create user', 422);
        }

        $token = auth()->attempt([
            "clientId" => $clientId,
            "password" => $requestValidated->password
        ]);

        if(!$token){
            return new ApiErrorResponse('Unauthorized', 401);
        }

        $data['name'] = $this->decrypt($user->name);
        $data['type'] = $user->type;
        $data['token'] = $this->respondWithToken($token);

        return new ApiSuccessResponse($data, 'user created successfully');
    }

}
