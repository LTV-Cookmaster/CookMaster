<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => $this->faker->dateTime(),
            'address' => $this->faker->address(),
            'postal_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'country' => $this->faker->randomElement(['France', 'Germany', 'Japan', 'USA', 'Italia', 'Spain']),
            'phone' => $this->faker->phoneNumber(),
            'password' => Hash::make(Str::random(10)),
            'remember_token' => Str::random(10),
            'is_ban' => $this->faker->boolean(),
            'referral_code' => Str::random(10),
            'referee_code' => Str::random(10),
            'created_at' => $this->faker->dateTimeBetween('01-01-2023', 'now'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
