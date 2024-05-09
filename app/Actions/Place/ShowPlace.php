<?php

namespace App\Actions\Place;

use App\Models\Place;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class ShowPlace
{
    use ApiResponse;

    public function __invoke(int $id): JsonResponse
    {
        $place = Place::find($id);

        if(! $place) {
            return $this->errorResponse(
                message: 'Place not found',
                code: 404
            );
        }

        return $this->successResponse(
            message: 'Place found',
            data: $place,
        );
    }
}
