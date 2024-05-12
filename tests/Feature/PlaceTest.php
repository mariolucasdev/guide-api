<?php

use App\Models\Category;
use App\Models\Place;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

test('should be responded with list places json', function () {
    $user = User::factory()->create();

    $category = Category::factory()
        ->create([
            'user_id' => $user->id,
        ]);

    Place::factory(5)
        ->create([
            'category_id' => $category->id,
            'user_id' => $user->id,
        ]);

    $response = $this->get('/api/places');

    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'image',
                    'alias',
                    'description',
                    'keywords',
                    'email',
                    'zip_code',
                    'address',
                    'number',
                    'complement',
                    'city',
                    'state',
                    'geo_location',
                    'phone',
                    'whatsapp',
                    'website',
                    'facebook',
                    'instagram',
                    'linkedin',
                    'status',
                    'category_id',
                    'user_id',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
})->group('place');

test('should be responded with single place json', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $category = Category::factory()
        ->create([
            'user_id' => $user->id,
        ]);

    $place = Place::factory()
        ->create([
            'category_id' => $category->id,
            'user_id' => $user->id,
        ]);

    $response = $this->get(route('places.show', $place->id));

    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'data' => [
                'id',
                'name',
                'image',
                'alias',
                'description',
                'keywords',
                'email',
                'zip_code',
                'address',
                'number',
                'complement',
                'city',
                'state',
                'geo_location',
                'phone',
                'whatsapp',
                'website',
                'facebook',
                'instagram',
                'linkedin',
                'status',
                'category_id',
                'user_id',
                'created_at',
                'updated_at',
            ],
        ]);
})->group('place');

test('a new place should be created', function () {
    $user = User::factory()->create();

    $category = Category::factory()
        ->create([
            'user_id' => $user->id,
        ]);

    $place = Place::factory()
        ->makeOne([
            'category_id' => $category->id,
            'user_id' => $user->id,
        ]);

    Sanctum::actingAs($user);

    $response = $this
        ->post('/api/places', $place->toArray());

    $response
        ->assertStatus(201)
        ->assertJsonStructure([
            'message',
            'data' => [
                'id',
                'name',
                'image',
                'alias',
                'description',
                'keywords',
                'email',
                'zip_code',
                'address',
                'number',
                'complement',
                'city',
                'state',
                'geo_location',
                'phone',
                'whatsapp',
                'website',
                'facebook',
                'instagram',
                'linkedin',
                'status',
                'category_id',
                'user_id',
                'created_at',
                'updated_at',
            ],
            'status',
        ]);
})->group('place');

test('place should be updated', function () {

    $user = User::factory()->create();

    $category = Category::factory()
        ->create([
            'user_id' => $user->id,
        ]);

    Sanctum::actingAs($user);

    $place = Place::factory()
        ->create([
            'category_id' => $category->id,
            'user_id' => $user->id,
        ]);

    $place->name = 'New Name';
    $place->description = 'New Description';

    $response = $this
        ->put(
            route('places.update', $place->id),
            $place->toArray()
        );

    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'data' => [
                'id',
                'name',
                'image',
                'alias',
                'description',
                'keywords',
                'email',
                'zip_code',
                'address',
                'number',
                'complement',
                'city',
                'state',
                'geo_location',
                'phone',
                'whatsapp',
                'website',
                'facebook',
                'instagram',
                'linkedin',
                'status',
                'category_id',
                'user_id',
                'created_at',
                'updated_at',
            ],
            'status',
        ]);

    $updatedPlace = Place::find($place->id);

    expect($updatedPlace->name)->toBe('New Name');
    expect($updatedPlace->description)->toBe('New Description');
})->group('place');

test('place should be deleted', function () {

    $user = User::factory()->create();

    $category = Category::factory()
        ->create([
            'user_id' => $user->id,
        ]);

    $place = Place::factory()
        ->create([
            'category_id' => $category->id,
            'user_id' => $user->id,
        ]);

    Sanctum::actingAs($user);

    $response = $this->delete(route('places.destroy', $place->id));

    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'status',
        ]);

    $place = Place::find($place->id);

    expect($place)->toBeNull();

})->group('place');
