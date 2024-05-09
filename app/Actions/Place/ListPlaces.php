<?php

namespace App\Actions\Place;

use App\Models\Place;
use App\Traits\ApiResponse;

class ListPlaces
{
    use ApiResponse;

    public function __invoke()
    {
        $places = Place::all();

        return $this->successResponse(
            message: 'List of all places',
            data: $places,
        );
    }
}
