<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'document' => 1051822577,
            'name' => 'Yeison ',
            'lastname' => 'Barrios Funieles',
            'role' => 1,
            'email' => 'test@example.com',
            'profesion' => 'PEDIATRA',
            'city' => 'Cartagena de Indias',
            'location' => 'Cra 45 Cl 25 - 36',
            'numberPhone' => '3046048014',
        ]);

    }
}
