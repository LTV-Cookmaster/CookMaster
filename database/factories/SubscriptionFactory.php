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
            'id' => $this->faker->uuid(),
            'user_id' => $this->faker->uuid(),
            'subscription_type' => $this->faker->randomElement(['freePlan', 'starterPlan', 'masterPlan']),
            'start_date' => $this->faker->dateTimeBetween('01-01-2022', '31-12-2022'),
            'end_date' => $this->faker->dateTimeBetween('01-01-2023', 'now'),
            'price_per_month' => $this->faker->numberBetween(5,20),
            'annual_price' => $this->faker->numberBetween(100,400),
            'advertising' => $this->faker->boolean(),
            'commenting' => $this->faker->boolean(),
            'lessons' => $this->faker->randomElement([1,5,10000]),
            'chat' => $this->faker->boolean(),
            'discount' => $this->faker->boolean(),
            'free_delivery' => $this->faker->randomElement(['none','relay','everywhere']),
            'kitchen_space' => $this->faker->boolean(),
            'exclusive_events' => $this->faker->boolean(),
            'referral_reward' => $this->faker->boolean(),
            'renewal_bonus' => $this->faker->boolean(),
        ];
    }
}
