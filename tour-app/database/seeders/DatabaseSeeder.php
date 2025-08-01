<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // Seed post categories first
        $this->call([
            PostCategorySeeder::class,
        ]);

        \App\Models\Tour::factory(20)->create();
    }
}
