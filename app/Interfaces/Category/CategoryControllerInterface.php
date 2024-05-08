<?php

namespace App\Interfaces\Category;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Http\JsonResponse;

interface CategoryControllerInterface
{
    public function index(): JsonResponse;

    public function show(int $id): JsonResponse;

    public function store(StoreCategoryRequest $request): JsonResponse;

    public function update(UpdateCategoryRequest $request, int $id): JsonResponse;

    public function destroy(int $id): JsonResponse;
}
