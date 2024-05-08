<?php

use App\Models\Category;
use App\Models\User;

test('should be response json with list categories', function () {
    $response = $this->get('/api/categories');

    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
})->group('category');

test('should be response json with category detail', function () {

    $category = Category::factory()->create([
        'user_id' => User::factory()->create()->id,
    ]);

    $response = $this->get("/api/categories/{$category->id}");

    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'created_at',
                'updated_at',
            ],
        ]);
})->group('category');

test('show category not found', function () {
    $response = $this->get('/api/categories/1');

    $response
        ->assertStatus(404)
        ->assertJsonStructure([
            'message',
            'status',
        ]);
})->group('category');
