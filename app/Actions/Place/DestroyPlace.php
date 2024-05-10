<?php

namespace App\Actions\Place;

use App\Actions\Action;
use App\Models\Place;
use Illuminate\Http\JsonResponse;

final class DestroyPlace extends Action
{
    public function __invoke(int $id): JsonResponse
    {
        $place = Place::find($id);

        if(! $place) {
            return $this->errorResponse(
                message: 'Place not found',
                code: 404
            );
        }

        $place->delete();

        return $this->successResponse(
            message: 'Place deleted successfully',
        );
    }
}
