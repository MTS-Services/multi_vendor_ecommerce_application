<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            'parent_id' => 1,
            'parent_type' => "App\Models\State",
            'name' => 'Huntsville',
            'slug' => 'huntsville',
        ]);

        City::create([
            'parent_id' => 1,
            'parent_type' => "App\Models\Country",
            'name' => 'Dhaka',
            'slug' => 'dhaka',
        ]);
    }
}
