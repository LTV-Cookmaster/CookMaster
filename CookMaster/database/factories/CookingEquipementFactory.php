<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CookingEquipementFactory extends Factory
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
            'category' => $this->faker->randomElement(['knives', 'pans', 'pots', 'oven', 'microwave', 'fridge', 'freezer', 'kitchen utensils', 'other']),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'available_quantity' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->numberBetween(1, 100),
            'image' => $this->faker->imageUrl(640, 480, 'food'),
        ];
    }
}
