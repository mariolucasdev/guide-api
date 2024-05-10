<?php

namespace App\Actions\Place;

use App\Actions\Action;
use App\Http\Requests\Place\StorePlaceRequest;
use App\Models\Place;
use Illuminate\Http\JsonResponse;

final class StorePlace extends Action
{
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
