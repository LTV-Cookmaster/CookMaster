<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
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
            'event_id' => $this->faker->uuid,
            'user_id' => $this->faker->uuid,
            'room_id' => $this->faker->uuid,
            'type' => $this->faker->randomElement(['tastingEvent', 'professionalFormation', 'onlineWorkshop', 'meetingEvent', 'homeWorkshop']),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
        ];
    }
}
