<?php

namespace Database\Factories;

use App\Models\Office;
use App\Models\Room;
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
    protected $model = Room::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'office_id' => $this->faker->uuid(),
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'max_capacity' => $this->faker->numberBetween(1,10),
            'price' => $this->faker->numberBetween(100,400),
            'is_booked' => $this->faker->boolean,
        ];
    }
}
