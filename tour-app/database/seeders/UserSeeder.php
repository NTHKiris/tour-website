<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo user admin trước
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@binhdinhtour.com',
            'phone' => '0123456789',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Tạo một số user thường
        User::factory(5)->create();
    }
}
