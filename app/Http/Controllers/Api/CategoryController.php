<?php

namespace App\Http\Controllers\Api;

use App\Actions\Category\DestroyCategory;
use App\Actions\Category\ListCategories;
use App\Actions\Category\ShowCategory;
use App\Actions\Category\StoreCategory;
use App\Actions\Category\UpdateCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Interfaces\Category\CategoryControllerInterface;
use Illuminate\Http\JsonResponse;

final class CategoryController extends Controller implements CategoryControllerInterface
{
    public function index(): JsonResponse
    {
        return app(ListCategories::class)();
    }

    public function show(int $id): JsonResponse
    {
        return app(ShowCategory::class)($id);
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        return app(StoreCategory::class)($request);
    }

    public function update(UpdateCategoryRequest $request, int $id): JsonResponse
    {
        return app(UpdateCategory::class)($request, $id);
    }

    public function destroy(int $id): JsonResponse
    {
        return app(DestroyCategory::class)($id);
    }
}
