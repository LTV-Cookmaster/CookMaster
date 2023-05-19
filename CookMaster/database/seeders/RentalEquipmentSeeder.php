<?php

namespace Database\Seeders;

use App\Models\Office;
use App\Models\RentalEquipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentalEquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RentalEquipment::factory(10)->create([
            'office_id' => Office::factory()->create(),
        ]);
    }
}
