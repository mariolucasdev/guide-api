<?php

use App\Models\Category;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

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

    $user = Sanctum::actingAs(
        User::factory()->create(),
        ['*']
    );

    $category = Category::factory()->create([
        'user_id' => $user->id,
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

test('should be response not found category', function () {
    $response = $this->get('/api/categories/1');

    $response
        ->assertStatus(404)
        ->assertJsonStructure([
            'message',
            'status',
        ]);
})->group('category');

test('create category', function () {

    $user = Sanctum::actingAs(
        User::factory()->create(),
        ['*']
    );

    $response = $this
        ->post('/api/categories', [
            'name' => 'Category Test',
            'user_id' => $user->id,
        ]);

    $response
        ->assertStatus(201)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'created_at',
                'updated_at',
            ],
        ]);
})->group('category');
