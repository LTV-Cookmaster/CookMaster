<?php

namespace Database\Seeders;

use App\Models\Contractor;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContractorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contractor::factory()->has(Event::factory()->count(10))->create();
    }
}
