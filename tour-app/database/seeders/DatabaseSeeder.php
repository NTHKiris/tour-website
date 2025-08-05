<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\TourSeeder;
use Database\Seeders\DestinationSeeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\PostCategorySeeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        
        $this->call([
            UserSeeder::class,
            DestinationSeeder::class,
            TourSeeder::class,
            PostCategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}
