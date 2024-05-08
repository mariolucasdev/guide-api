<?php

use App\Models\Category;
use App\Models\Place;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

test('should be list places', function () {
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
                ]
            ]
        ]);
});

test('should be show place', function () {
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
            ]
        ]);
});

test('should be create a place', function () {
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
});
