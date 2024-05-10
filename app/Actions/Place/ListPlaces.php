<?php

namespace App\Actions\Place;

use App\Actions\Action;
use App\Models\Place;
use Illuminate\Http\JsonResponse;

final class ListPlaces extends Action
{
    public function __invoke(): JsonResponse
    {
        $places = Place::all();

        return $this->successResponse(
            message: 'List of all places',
            data: $places,
        );
    }
}
