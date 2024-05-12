<?php

namespace App\Actions\Place;

use App\Actions\Action;
use App\Http\Requests\Place\UpdatePlaceRequest;
use App\Models\Place;
use Illuminate\Http\JsonResponse;

final class UpdatePlace extends Action
{
    public function __invoke(UpdatePlaceRequest $request, int $id): JsonResponse
    {
        $place = Place::find($id);

        if (! $place) {
            return $this->errorResponse(
                message: 'Place not found',
                code: 404
            );
        }

        $place->update($request->validated());

        return $this->successResponse(
            message: 'Place updated successfully',
            data: $place,
        );
    }
}
