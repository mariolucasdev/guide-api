<?php

namespace App\Http\Controllers;

use App\Actions\Category\{
    StoreCategory,
    UpdateCategory,
    DestroyCategory
};
use App\Interfaces\Category\CategoryControllerInterface;
use App\Http\Requests\Category\{
    StoreCategoryRequest,
    UpdateCategoryRequest
};
use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller implements CategoryControllerInterface
{
    use ApiResponse;

    public function index(): JsonResponse
    {
        $categories = Category::all();

        return $this->successResponse(
            message: 'Categories retrieved successfully',
            data: $categories
        );
    }

    public function show(int $id): JsonResponse
    {
        $category = Category::find($id);

        if (! $category) {
            return $this->errorResponse(
                message: 'Category not found',
                code: 404
            );
        }

        return $this->successResponse(
            message: 'Category retrieved successfully',
            data: $category
        );
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $storeCategory = new StoreCategory();

        return $storeCategory($request);
    }

    public function update(UpdateCategoryRequest $request, int $id): JsonResponse
    {
        $updateCategory = new UpdateCategory();

        return $updateCategory($request, $id);
    }

    public function destroy(int $id): JsonResponse
    {
        $destroyCategory = new DestroyCategory();

        return $destroyCategory($id);
    }
}
