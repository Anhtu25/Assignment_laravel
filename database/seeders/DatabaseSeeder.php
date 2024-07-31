<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // PublisherSeeder::class
            // AuthorSeeder::class
            // CategorySeeder::class
            // BookSeeder::class
            UserSeeder::class
        ]);
    }
}
