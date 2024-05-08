<?php

namespace App\Http\Controllers;

use App\Actions\Category\StoreCategory;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
}
