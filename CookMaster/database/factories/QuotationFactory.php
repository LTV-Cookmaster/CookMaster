<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuotationFactory extends Factory
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
            'room_id' => $this->faker->uuid,
            'contractor_id' => $this->faker->uuid,
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(100, 1000),
            'is_accepted' => $this->faker->boolean,
        ];
    }
}
