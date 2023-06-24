<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Office;
use App\Models\Recipe;
use App\Models\Room;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ContractorSeeder::class,
            CookingEquipmentSeeder::class,
            DishSeeder::class,
            IngredientSeeder::class,
            OfficeSeeder::class,
            RecipeSeeder::class,
            RentalEquipmentSeeder::class,
            SubscriptionSeeder::class,
            QuotationSeeder::class,
            InvoiceSeeder::class,
            EventSeeder::class,
        ]);
    }
}
