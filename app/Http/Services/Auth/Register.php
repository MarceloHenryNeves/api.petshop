<?php

namespace App\Http\Services\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Http\Services\ServiceBase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends ServiceBase
{
    public function execute(RegisterRequest $request)
    {

        $requestValidated = (object)$request->validated();

        $clientId = $this->hashClientId($requestValidated->email . '|' . getenv('APPLICATION_TOKEN'));

        if(User::exist($clientId)){
            return response()->json('user already exist', 422);
        }

        $newUser = User::create([
            "name" => $this->encrypt($requestValidated->name),
            "clientId" => $clientId,
            "email" => $this->encrypt($requestValidated->email),
            "cpf" => $this->encrypt($requestValidated->cpf),
            "password" => Hash::make($requestValidated->password),
            "phone" => $this->encrypt($requestValidated->phone),
            "type" => $requestValidated->type,
            "date_of_birth" =>  $requestValidated->date_of_birth ?? null
        ]);

        if(!$newUser){
            return new ApiErrorResponse('could not create user', 422);
        }

        $token = auth()->attempt([
            "clientId" => $clientId,
            "password" => $requestValidated->password
        ]);

        if(!$token){
            return new ApiErrorResponse('Unauthorized', 401);
        }


        $data['name'] = $this->decrypt($newUser->name);
        $data['cpf'] = $this->decrypt($newUser->cpf);
        $data['email'] = $this->decrypt($newUser->email);
        $data['phone'] = $this->decrypt($newUser->phone);
        $data['type'] = $newUser->type;
        $data['token'] = $this->respondWithToken($token);

        return new ApiSuccessResponse($data, 'user created successfully');
    }

}
