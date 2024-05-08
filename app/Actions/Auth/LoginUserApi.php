<?php

namespace App\Actions\Auth;

use App\Http\Requests\Auth\ApiLoginRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class LoginUserApi
{
    use ApiResponse;

    public function __invoke(ApiLoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return $this->errorResponse(
                message: 'The provided credentials are incorrect.',
                code: 401
            );
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->successResponse(
            message: 'User authenticated',
            data: [
                'token' => $token,
                'user' => $user
            ]
        );
    }
}
