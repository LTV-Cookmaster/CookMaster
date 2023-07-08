<?php

namespace Database\Seeders;

use App\Models\Contractor;
use App\Models\Event;
use App\Models\Office;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Event::factory([
                'contractor_id' => Contractor::factory()->create(),
                'office_id' => Office::factory()->create(),
                'room_id' => Room::factory([
                    'office_id' => Office::factory(),
                ])->create(),
            ])->create();
        }
    }
}
