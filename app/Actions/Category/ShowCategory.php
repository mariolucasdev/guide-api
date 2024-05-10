<?php

namespace App\Actions\Category;

use App\Actions\Action;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

final class ShowCategory extends Action
{
    public function __invoke(int $id): JsonResponse
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
}
