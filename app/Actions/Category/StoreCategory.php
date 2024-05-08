<?php

namespace App\Actions\Category;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class StoreCategory
{
    use ApiResponse;

    public function __invoke(StoreCategoryRequest $request)
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
