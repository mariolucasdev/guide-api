<?php

namespace App\Actions\Place;

use App\Actions\Action;
use App\Models\Place;
use Illuminate\Http\JsonResponse;

final class ShowPlace extends Action
{
    public function __invoke(int $id): JsonResponse
    {
        $place = Place::find($id);

        if (! $place) {
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
