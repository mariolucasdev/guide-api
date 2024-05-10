<?php

namespace App\Http\Controllers\Api;

use App\Actions\Place\{
    ListPlaces,
    ShowPlace,
    StorePlace,
    UpdatePlace,
    DestroyPlace,
};
use App\Http\Controllers\Controller;
use App\Http\Requests\Place\{
    StorePlaceRequest,
    UpdatePlaceRequest,
};
use App\Interfaces\Place\PlaceControllerInterface;
use Illuminate\Http\JsonResponse;

class PlaceController extends Controller implements PlaceControllerInterface
{
    public function index(): JsonResponse
    {
        $listPlaces = new ListPlaces();

        return $listPlaces();
    }

    public function store(StorePlaceRequest $request): JsonResponse
    {
        $storePlace = new StorePlace();

        return $storePlace($request);
    }

    public function show(int $id): JsonResponse
    {
        $showPlace = new ShowPlace();

        return $showPlace($id);
    }

    public function update(UpdatePlaceRequest $request, int $id): JsonResponse
    {
        $updatePlace = new UpdatePlace();

        return $updatePlace($request, $id);
    }

    public function destroy(int $id): JsonResponse
    {
        $destroyPlace = new DestroyPlace();

        return $destroyPlace($id);
    }
}
