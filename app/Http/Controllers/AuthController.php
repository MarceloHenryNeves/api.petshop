<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\Auth\Login;
use App\Http\Services\Auth\Refresh;
use App\Http\Services\Auth\Register;
use App\Http\Services\Auth\UserLogged;
use App\Models\User;

class AuthController extends Controller
{

    public function register(RegisterRequest $request, Register $service)
    {
        return $service->execute($request);
    }

    public function login(LoginRequest $request, Login $service, User $user)
    {
        return $service->execute($request, new UserRepository($user));
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
