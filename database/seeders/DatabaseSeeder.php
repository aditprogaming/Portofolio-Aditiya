<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cukup panggil PortfolioSeeder saja di sini
        $this->call([
            PortfolioSeeder::class,
        ]);
    }
}