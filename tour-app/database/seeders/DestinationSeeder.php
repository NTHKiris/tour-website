<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Destination::create([
            'name' => 'Quy Nhon',
            'slug' => 'quy-nhon',
            'description' => 'Beautiful coastal city in Binh Dinh',
            'location' => 'Binh Dinh Province',
            'coordinates' => \DB::raw('POINT(109.2, 13.7)'),
            'featured_image' => '/images/quy-nhon.jpg'
        ]);

        \App\Models\Destination::create([
            'name' => 'Ky Co Beach',
            'slug' => 'ky-co-beach',
            'description' => 'Paradise beach with crystal clear water',
            'location' => 'Quy Nhon, Binh Dinh',
            'coordinates' => \DB::raw('POINT(109.3, 13.8)'),
            'featured_image' => '/images/ky-co.jpg'
        ]);
    }
}
