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
        return app(ListPlaces::class)();
    }

    public function store(StorePlaceRequest $request): JsonResponse
    {
        return app(StorePlace::class)($request);
    }

    public function show(int $id): JsonResponse
    {
        return app(ShowPlace::class)($id);
    }

    public function update(UpdatePlaceRequest $request, int $id): JsonResponse
    {
        return app(UpdatePlace::class)($request, $id);
    }

    public function destroy(int $id): JsonResponse
    {
        return app(DestroyPlace::class)($id);
    }
}
