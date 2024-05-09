<?php

namespace App\Actions\Place;

use App\Models\Place;
use App\Traits\ApiResponse;

class DestroyPlace
{
    use ApiResponse;

    public function __invoke(int $id)
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
