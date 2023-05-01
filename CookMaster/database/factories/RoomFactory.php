<?php

namespace Database\Factories;

use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoomFactory extends Factory
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
            'office_id' => $this->faker->uuid,
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'max_capacity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->numberBetween(100, 500),
            'is_booked' => $this->faker->boolean(),
        ];
    }
}
