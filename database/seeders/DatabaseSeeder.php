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
        $this->call([
            BranchSeeder::class,
            UserSeeder::class,
            CitySeeder::class,
            IdeaCategorySeeder::class,
            IdeaSeeder::class,
            ExpertSeeder::class,
            PostSeeder::class,
            PageSeeder::class,
            SliderSeeder::class,
        ]);
    }
}
