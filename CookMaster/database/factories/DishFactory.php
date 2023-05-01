<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DishFactory extends Factory
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
            'category' => $this->faker->name,
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(1, 100),
            'image' => $this->faker->imageUrl(640, 480, 'food'),
        ];
    }
}
