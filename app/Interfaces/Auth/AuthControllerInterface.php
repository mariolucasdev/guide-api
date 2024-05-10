<?php

namespace App\Interfaces\Auth;

use App\Http\Requests\Auth\ApiLoginRequest;
use App\Http\Requests\Auth\ApiRegisterRequest;
use Illuminate\Http\JsonResponse;

interface AuthControllerInterface
{
    public function login(ApiLoginRequest $request): JsonResponse;

    public function register(ApiRegisterRequest $request): JsonResponse;
}
