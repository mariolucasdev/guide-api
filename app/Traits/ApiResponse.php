<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    /**
     * Return a success JSON response.
     *
     * @param string $message
     * @param mixed $data
     * @param string $status
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public static function successResponse(
        string $message,
        string|array $data = null,
        string $status = 'success',
        int $code = 200
    ): JsonResponse {
        return response()->json([
            'message' => $message,
            'status' => $status,
            'data' => $data
        ], $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param string $message
     * @param mixed $data
     * @param string $status
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public static function errorResponse(
        string $message,
        string|array $data = null,
        string $status = 'error',
        int $code = 400
    ): JsonResponse {
        return response()->json([
            'message' => $message,
            'status' => $status,
            'data' => $data
        ], $code);
    }
}
