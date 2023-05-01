<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WorkshopFactory extends Factory
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
            'room_id' => $this->faker->uuid,
            'contractor_id' => $this->faker->uuid,
            'type' => $this->faker->randomElement(['workshop', 'professional formation']),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(1, 100),
            'max_number_of_participants' => $this->faker->numberBetween(1, 100),
            'start_date' => $this->faker->date('d-m-Y'),
            'end_date' => $this->faker->date('d-m-Y'),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
        ];
    }
}