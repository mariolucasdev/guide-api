<?php

namespace App\Actions\Category;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class StoreCategory
{
    use ApiResponse;

    public function __invoke(StoreCategoryRequest $request): JsonResponse
    {
        $data = $request->validated();

        $category = Category::create($data);

        return $this->successResponse(
            message: 'Category created successfully',
            data: $category,
            code: 201
        );
    }
}
