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

test('update, create, delete category wuthout authentication', function () {
    $response = $this->postJson('/api/categories', [
        'name' => 'Category Test',
        'user_id' => 1,
    ]);

    $response->assertStatus(401);

    $response = $this->putJson('/api/categories/1', [
        'name' => 'Category Test',
    ]);

    $response->assertStatus(401);

    $response = $this->deleteJson('/api/categories/1');

    $response->assertStatus(401);
})->group('category');

test('should be create category', function () {

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

test('should be update category', function () {

    $user = Sanctum::actingAs(
        User::factory()->create(),
        ['*']
    );

    $category = Category::factory()->create([
        'user_id' => $user->id,
    ]);

    $response = $this
        ->put("/api/categories/{$category->id}", [
            'name' => 'Category Test Update',
            'user_id' => $user->id,
        ]);

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

test('should be delete category', function () {

    $user = Sanctum::actingAs(
        User::factory()->create(),
        ['*']
    );

    $category = Category::factory()->create([
        'user_id' => $user->id,
    ]);

    $response = $this->deleteJson(route('categories.destroy', $category->id));

    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'status',
        ]);

    $categoriesNumber = Category::all()->count();

    expect($categoriesNumber)->toBe(0);

})->group('category');
