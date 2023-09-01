<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\User;
use App\Services\Auth\Login;
use App\Services\Auth\Refresh;
use App\Services\Auth\Register;
use App\Services\Auth\UserLogged;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function register(RegisterRequest $request, Register $service)
    {
        return $service->execute($request);
    }

    public function login(LoginRequest $request, Login $service)
    {
        return $service->execute($request);
    }

    public function me(UserLogged $service)
    {
        return $service->execute();
    }


    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh(Refresh $service)
    {
        return $service->execute();
    }

}
