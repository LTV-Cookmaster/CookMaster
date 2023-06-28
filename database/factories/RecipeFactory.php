<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RecipeFactory extends Factory
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
            'category' => $this->faker->randomElement(['salty, sweet']),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'prep_time' => $this->faker->numberBetween(1, 60),
            'cooking_time' => $this->faker->numberBetween(1, 60),
            'number_of_persons' => $this->faker->numberBetween(1, 10),
            'type' => $this->faker->randomElement(['starter', 'main course', 'dessert, snack, drink']),
            'gastronomy' => $this->faker->randomElement(['french', 'italian', 'japanese']),
            'difficulty' => $this->faker->randomElement(['easy', 'medium', 'hard']),
            'is_bookmarked' => $this->faker->boolean,
        ];
    }
}
