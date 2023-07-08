<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_date = $this->faker->dateTimeBetween('01-01-2022', 'now')->format('d-m-Y');
        $end_date = $this->faker->dateTimeBetween($start_date, 'now')->format('d-m-Y');
        return [
            'id' => $this->faker->uuid,
            'contractor_id' => $this->faker->uuid,
            'type' => $this->faker->randomElement(['tastingEvent', 'professionalFormation', 'onlineWorkshop', 'meetingEvent', 'homeWorkshop']),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(1, 100),
            'number_of_participants' => $this->faker->numberBetween(1, 100),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'start_time' => $this->faker->time('H:i'),
            'end_time' => $this->faker->time('H:i'),
            'img_url' => $this->faker->randomElement(['events/1.jpg', 'events/2.jpg', 'events/3.jpg', 'events/4.jpg', 'events/5.jpg', 'events/6.jpg']),
        ];
    }
}
