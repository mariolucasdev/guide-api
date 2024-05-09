<?php

namespace App\Actions\Place;

use App\Http\Requests\Place\UpdatePlaceRequest;
use App\Models\Place;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class UpdatePlace
{
    use ApiResponse;

    public function __invoke(UpdatePlaceRequest $request, int $id): JsonResponse
    {
        $place = Place::find($id);

        if(! $place) {
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
