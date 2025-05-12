<?php

namespace Database\Seeders;

use App\Models\LatestOffer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LatestOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LatestOffer::create([,
                'title'        => ' Lastest Offer 1' ,
                'image'        => 'lastest-offers/1.jpg',
                'url'          => '#',

            ]);
            LatestOffer::create([,
                'title'        => ' Lastest Offer 2' ,
                'image'        => 'lastest-offers/2.jpg',
                'url'          => '#',

            ]);
            LatestOffer::create([,
                'title'        => ' Lastest Offer 3' ,
                'image'        => 'lastest-offers/3.jpg',
                'url'          => '#',

            ]);
    }
}
