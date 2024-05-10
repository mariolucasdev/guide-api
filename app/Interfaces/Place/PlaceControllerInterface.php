<?php

namespace App\Interfaces\Place;

use App\Http\Requests\Place\StorePlaceRequest;
use App\Http\Requests\Place\UpdatePlaceRequest;
use Illuminate\Http\JsonResponse;

interface PlaceControllerInterface
{
    public function index(): JsonResponse;

    public function show(int $id): JsonResponse;

    public function store(StorePlaceRequest $request): JsonResponse;

    public function update(UpdatePlaceRequest $request, int $id): JsonResponse;

    public function destroy(int $id): JsonResponse;
}
