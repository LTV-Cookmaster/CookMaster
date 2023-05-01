<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ContractorSeeder::class,
            CookingEquipmentSeeder::class,
            DishSeeder::class,
            IngredientSeeder::class,
            InvoiceSeeder::class,
            OfficeSeeder::class,
            QuotationSeeder::class,
            RecipeSeeder::class,
            RentalEquipmentSeeder::class,
            RoomSeeder::class,
            SubscriptionSeeder::class,
            UserSeeder::class,
            WorkshopSeeder::class,
        ]);
    }
}
