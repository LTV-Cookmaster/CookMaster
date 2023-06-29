<?php

namespace Database\Seeders;

use App\Models\Contractor;
use App\Models\Event;
use App\Models\Office;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = ['tastingEvent', 'professionalFormation', 'onlineWorkshop', 'meetingEvent', 'homeWorkshop'];
        for ($i = 0; $i < 10; $i++)
        {
            Reservation::factory([
                'event_id' => Event::factory([
                    'contractor_id' => Contractor::factory(),
                ])->create(),
                'user_id' => User::factory()->create(),
                'room_id' => Room::factory([
                    'office_id' => Office::factory(),
                ])->create(),
                'office_id' => Office::factory()->create(),
                'type' => Arr::random($type),
            ])->create();
        }
    }

}
