<?php

namespace App\Actions\Category;

use App\Actions\Action;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

final class StoreCategory extends Action
{
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
