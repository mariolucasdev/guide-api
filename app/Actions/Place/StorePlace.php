<?php

namespace App\Actions\Place;

use App\Http\Requests\Place\StorePlaceRequest;
use App\Models\Place;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class StorePlace
{
    use ApiResponse;

    public function __invoke(StorePlaceRequest $request): JsonResponse
    {
        $place = Place::create($request->validated());

        return $this->successResponse(
            message: 'Place created successfully',
            data: $place,
            status: 'success',
            code: 201
        );
    }
}
