<?php

namespace Database\Seeders;

use App\Models\Hub;
use App\Models\OfferBanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hub::create([

            'country_id' => 1,
            'city_id' => 1,
            'name'=> ' STPDT Hub',
            'slug' => 'stpdt-hub',
        ]);
        Hub::create([

            'country_id' => 1,
            'city_id' => 1,
            'name'=> ' Posted Hub',
            'slug' => 'posted-hub',
        ]);
        Hub::create([

            'country_id' => 1,
            'city_id' => 1,
            'name'=> ' Latest Hub',
            'slug' => 'latest-hub',
        ]);
    }
}
