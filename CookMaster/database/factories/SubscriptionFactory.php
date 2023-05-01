<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'user_id' => $this->faker->uuid,
            'subscription_type_id' => $this->faker->numberBetween(1, 3),
            'start_date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTime(),
            'price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
