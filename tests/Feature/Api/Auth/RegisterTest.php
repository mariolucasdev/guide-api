<?php

test('should be can register api user', function () {
    $user = [
        'name' => 'Mário Lucas',
        'email' => 'mario@test.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ];

    $response = $this->postJson('/api/auth/register', $user);

    $response
        ->assertStatus(201)
        ->assertHeader('content-type', 'application/json')
        ->assertJsonStructure([
            'message',
            'status',
            'data' => [
                'token',
                'user' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
})->group('auth');

test('should respond with password confirmation error', function () {
    $user = [
        'name' => 'Mário Lucas',
        'email' => 'mario@test.com',
        'password' => 'password',
    ];

    $response = $this->postJson('/api/auth/register', $user);

    $response
        ->assertStatus(422)
        ->assertHeader('content-type', 'application/json')
        ->assertJsonStructure([
            'message',
            'errors' => [
                'password',
            ],
        ]);
})->group('auth');

test('should respond with email validation error', function () {
    $user = [
        'password' => 'password',
        'password_confirmation' => 'password',
    ];

    $response = $this->postJson('/api/auth/register', $user);

    $response
        ->assertStatus(422)
        ->assertHeader('content-type', 'application/json')
        ->assertJsonStructure([
            'message',
            'errors' => [
                'name',
                'email',
            ],
        ]);
})->group('auth');

test('should respond with existing email error', function () {
    $user = [
        'name' => 'Mário Lucas',
        'email' => 'mario@test.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ];

    $this->postJson('/api/auth/register', $user);

    $response = $this->postJson('/api/auth/register', $user);

    $response
        ->assertStatus(422)
        ->assertHeader('content-type', 'application/json')
        ->assertJsonStructure([
            'message',
            'errors' => [
                'email',
            ],
        ]);
})->group('auth');
