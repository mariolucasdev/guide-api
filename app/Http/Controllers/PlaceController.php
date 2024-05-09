<?php

namespace App\Http\Controllers;

use App\Actions\Place\ListPlaces;
use App\Actions\Place\ShowPlace;
use App\Actions\Place\StorePlace;
use App\Actions\Place\UpdatePlace;
use App\Http\Requests\Place\StorePlaceRequest;
use App\Http\Requests\Place\UpdatePlaceRequest;
use Illuminate\Http\JsonResponse;

class PlaceController extends Controller
{
    public function index(): JsonResponse
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
        $showPlace = new ShowPlace();

        return $showPlace($id);
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
    public function destroy(int $id)
    {
        //
    }
}
