<?php

namespace Database\Seeders;

use App\Models\CookingEquipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CookingEquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CookingEquipment::factory(10)->create();
    }
}
