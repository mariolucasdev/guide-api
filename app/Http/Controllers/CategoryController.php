<?php

namespace App\Http\Controllers;

use App\Actions\Category\{ StoreCategory, UpdateCategory };
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
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
        $category = new StoreCategory();

        return $category($request);
    }

    public function update(
        UpdateCategoryRequest $request,
        int $id
    ): JsonResponse {
        $category = new UpdateCategory();

        return $category($request, $id);
    }

    public function destroy(int $id): JsonResponse
    {
        $category = Category::find($id);

        if (! $category) {
            return $this->errorResponse(
                message: 'Category not found',
                code: 404
            );
        }

        $category->delete();

        return $this->successResponse(
            message: 'Category deleted successfully'
        );
    }
}
