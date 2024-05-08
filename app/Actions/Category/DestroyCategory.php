<?php

namespace App\Actions\Category;

use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class DestroyCategory
{
    use ApiResponse;

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
