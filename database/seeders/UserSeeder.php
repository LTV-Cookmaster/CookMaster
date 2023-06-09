<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'=> 'Admin',
            'email' => 'admin@test.com',
            'address' => '1 rue de la Paix',
            'postal_code' => '75001',
            'city' => 'Paris',
            'country' => 'France',
            'phone' => '0123456789',
            'password' => Hash::make('admin'),
            'is_admin' => true,
            'is_ban' => false,
        ]);
        User::factory()->create([
            'name'=> 'TP',
            'email' => 'tom@pitoun.com',
            'address' => '1 rue de la Paix',
            'postal_code' => '75001',
            'city' => 'Paris',
            'country' => 'France',
            'phone' => '6666666666',
            'password' => Hash::make('admin'),
            'is_admin' => true,
            'is_ban' => false,
        ]);
        User::factory(10)->create();
    }
}
