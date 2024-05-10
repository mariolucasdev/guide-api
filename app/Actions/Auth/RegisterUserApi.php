<?php

namespace App\Actions\Auth;

use App\Actions\Action;
use App\Http\Requests\Auth\ApiRegisterRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

final class RegisterUserApi extends Action
{
    public function __invoke(ApiRegisterRequest $request): JsonResponse
    {
        $user = User::create($request->validated())
            ->fill([
                'password' => Hash::make($request->password)
            ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->successResponse(
            message: 'User registered',
            data: [
                'token' => $token,
                'user' => $user
            ],
            code: 201
        );
    }
}
