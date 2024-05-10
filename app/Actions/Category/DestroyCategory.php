<?php

namespace App\Actions\Category;

use App\Actions\Action;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

final class DestroyCategory extends Action
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

        $category->delete();

        return $this->successResponse(
            message: 'Category deleted successfully'
        );
    }
}
