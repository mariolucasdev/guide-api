<?php

use App\Models\User;

test('user login api', function () {
    $user = User::factory()->create([
        'name' => 'Mário Lucas',
        'email' => 'mario@test.com',
        'password' => bcrypt('password')
    ]);

    $response = $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => 'password'
    ]);

    $response
        ->assertStatus(200);
})->group('auth');

test('user login api with invalid credentials', function () {
    $user = User::factory()->create([
        'name' => 'Mário Lucas',
        'email' => 'mario@test.com'
    ]);

    $response = $this->postJson('/api/login', [
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
