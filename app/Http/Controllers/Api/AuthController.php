<?php

namespace App\Http\Controllers\Api;

use App\Actions\Auth\LoginUserApi;
use App\Actions\Auth\RegisterUserApi;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\ApiRegisterRequest;
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
