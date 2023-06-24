<?php

namespace Database\Seeders;

use App\Models\Contractor;
use App\Models\Event;
use App\Models\Reservation;
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
                ]),
                'user_id' => User::factory(),
                'type' => Arr::random($type),
            ])->create();
        }
    }

}
