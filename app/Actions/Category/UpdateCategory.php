<?php

namespace App\Actions\Category;

use App\Actions\Action;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

final class UpdateCategory extends Action
{
    public function __invoke(UpdateCategoryRequest $request, int $id): JsonResponse
    {
        $category = Category::find($id);

        if (! $category) {
            return $this->errorResponse(
                message: 'Category not found',
                code: 404
            );
        }

        $category->update($request->validated());

        return $this->successResponse(
            message: 'Category updated successfully',
            data: $category
        );
    }
}
