<?php

namespace Database\Seeders;

use App\Models\Contractor;
use App\Models\Office;
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
        Quotation::factory()
            ->for(User::factory())
            ->for(Contractor::factory())
            ->create();
    }
}
