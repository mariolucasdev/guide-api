<?php

namespace App\Http\Controllers\Api;

use App\Actions\Auth\LoginUserApi;
use App\Actions\Auth\RegisterUserApi;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ApiLoginRequest;
use App\Http\Requests\Auth\ApiRegisterRequest;
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
