<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'image' => fake()->imageUrl(),
            'alias' => fake()->unique()->slug,
            'description' => fake()->text,
            'keywords' => fake()->words(3, true),
            'email' => fake()->unique()->safeEmail,
            'zip_code' => fake()->postcode,
            'address' => fake()->streetAddress,
            'number' => fake()->buildingNumber,
            'complement' => fake()->secondaryAddress,
            'city' => fake()->city,
            'state' => fake()->stateAbbr,
            'geo_location' => fake()->latitude.','.fake()->longitude,
            'phone' => fake()->phoneNumber,
            'whatsapp' => fake()->phoneNumber,
            'website' => fake()->url,
            'facebook' => fake()->url,
            'instagram' => fake()->url,
            'linkedin' => fake()->url,
            'status' => fake()->boolean,
        ];
    }
}
