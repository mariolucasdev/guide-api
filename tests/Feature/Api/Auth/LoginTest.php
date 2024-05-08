<?php

use App\Models\User;

test('user login api', function () {
    $user = User::factory()->create([
        'name' => 'Mário Lucas',
        'email' => 'mario@test.com',
        'password' => bcrypt('password')
    ]);

    $response = $this->postJson('/api/auth/login', [
        'email' => $user->email,
        'password' => 'password'
    ]);

    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'status',
            'data' => [
                'token',
                'user' => [
                    'id',
                    'name',
                    'email',
                    'email_verified_at',
                    'created_at',
                    'updated_at'
                ]
            ]
        ]);
})->group('auth');

test('user login api with invalid credentials', function () {
    $user = User::factory()->create([
        'name' => 'Mário Lucas',
        'email' => 'mario@test.com'
    ]);

    $response = $this->postJson('/api/auth/login', [
        'email' => $user->email,
        'password' => 'invalid-password'
    ]);

    $response
        ->assertStatus(401)
        ->assertJson([
            'message' => 'The provided credentials are incorrect.',
            'status' => 'error',
            'data' => null
        ]);
})->group('auth');

test('login user without email', function () {
    $response = $this->postJson('/api/auth/login', [
        'password' => 'password'
    ]);

    $response
        ->assertStatus(422)
        ->assertJson([
            'message' => 'The email field is required.',
            'errors' => [
                'email' => ['The email field is required.']
            ]
        ]);
})->group('auth');
