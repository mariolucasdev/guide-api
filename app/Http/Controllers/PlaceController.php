<?php

namespace App\Http\Controllers;

use App\Actions\Place\ListPlaces;
use App\Actions\Place\StorePlace;
use App\Actions\Place\UpdatePlace;
use App\Http\Requests\Place\StorePlaceRequest;
use App\Http\Requests\Place\UpdatePlaceRequest;
use App\Models\Place;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class PlaceController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $listPlaces = new ListPlaces();

        return $listPlaces();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlaceRequest $request): JsonResponse
    {
        $storePlace = new StorePlace();

        return $storePlace($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
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

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlaceRequest $request, int $id): JsonResponse
    {
        $updatePlace = new UpdatePlace();

        return $updatePlace($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        //
    }
}
