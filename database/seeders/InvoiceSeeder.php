<?php

namespace Database\Seeders;

use App\Models\Contractor;
use App\Models\Invoice;
use App\Models\Office;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invoice::factory()
            ->for(User::factory())
            ->for(Contractor::factory())
            ->create();
    }
}
