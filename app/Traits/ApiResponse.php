<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    /**
     * Return a success JSON response.
     *
     * @param  mixed  $data
     */
    public static function successResponse(
        string $message,
        string|array|null $data = null,
        string $status = 'success',
        int $code = 200
    ): JsonResponse {
        return response()->json([
            'message' => $message,
            'status' => $status,
            'data' => $data,
        ], $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param  mixed  $data
     */
    public static function errorResponse(
        string $message,
        string|array|null $data = null,
        string $status = 'error',
        int $code = 400
    ): JsonResponse {
        return response()->json([
            'message' => $message,
            'status' => $status,
            'data' => $data,
        ], $code);
    }
}
