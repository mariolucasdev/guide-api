<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Actions\Auth\{LoginUserApi, RegisterUserApi};
use App\Http\Requests\Auth\{ApiLoginRequest, ApiRegisterRequest};
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(ApiLoginRequest $request): JsonResponse
    {
        $user = new LoginUserApi();

        return $user($request);
    }

    public function register(ApiRegisterRequest $request): JsonResponse
    {
        $user = new RegisterUserApi();

        return $user($request);
    }
}
