<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Actions\Auth\{LoginUserApi, RegisterUserApi};
use App\Http\Requests\Auth\{ApiLoginRequest, ApiRegisterRequest};
use App\Interfaces\Auth\AuthControllerInterface;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller implements AuthControllerInterface
{
    public function login(ApiLoginRequest $request): JsonResponse
    {
        return app(LoginUserApi::class)($request);
    }

    public function register(ApiRegisterRequest $request): JsonResponse
    {
        return app(RegisterUserApi::class)($request);
    }
}
