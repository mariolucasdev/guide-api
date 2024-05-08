<?php

namespace App\Http\Controllers;

use App\Actions\Place\StorePlace;
use App\Http\Requests\Place\StorePlaceRequest;
use App\Models\Place;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $places = Place::all();

        return $this->successResponse(
            message: 'List of all places',
            data: $places,
        );
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
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        //
    }
}
