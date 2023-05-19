<?php

namespace Database\Seeders;

use App\Models\Contractor;
use App\Models\Quotation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quotation::factory(10)->create([
            'user_id' => User::factory()->create(),
            'room_id' => Room::factory()->create(),
            'contractor_id' => Contractor::factory()->create()
        ]);
    }
}
