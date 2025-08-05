<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\TourSeeder;
use Database\Seeders\DestinationSeeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\PostCategorySeeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {

        // Seed post categories first
        $this->call([
            PostCategorySeeder::class,
        ]);

        $this->call([TourSeeder::class]);
        $this->call([DestinationSeeder::class]);
        $this->call([PostSeeder::class]);
    }
}
