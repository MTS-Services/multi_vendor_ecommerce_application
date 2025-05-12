<?php

namespace Database\Seeders;

use App\Models\OfferBanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OfferBanner::create([
            'title'=> 'OfferBanner 1',
            'subtitle'=> 'OfferBanner 1',
            'image'=> 'OfferBanners/1.jpg',
            'url'=> '#',
            'start_date' => now(),
            'end_date' => now()->addDays(7),
        ]);
        OfferBanner::create([
            'title'=> 'OfferBanner 2',
            'subtitle'=> 'OfferBanner 2',
            'image'=> 'OfferBanners/2.jpg',
            'url'=> '#',
            'start_date' => now(),
            'end_date' => now()->addDays(7),
        ]);
        OfferBanner::create([
            'title'=> 'OfferBanner 3',
            'subtitle'=> 'OfferBanner 3',
            'image'=> 'OfferBanners/3.jpg',
            'url'=> '#',
            'start_date' => now(),
            'end_date' => now()->addDays(7),
        ]);
        OfferBanner::create([
            'title'=> 'OfferBanner 4',
            'subtitle'=> 'OfferBanner 4',
            'image'=> 'OfferBanners/4.jpg',
            'url'=> '#',
            'start_date' => now(),
            'end_date' => now()->addDays(7),
        ]);
    }
}
