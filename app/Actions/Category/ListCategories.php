<?php

namespace App\Actions\Category;

use App\Actions\Action;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

final class ListCategories extends Action
{
    public function __invoke(): JsonResponse
    {
        $categories = Category::all();

        return $this->successResponse(
            message: 'Categories retrieved successfully',
            data: $categories
        );
    }
}
