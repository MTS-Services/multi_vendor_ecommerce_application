<?php

namespace Database\Seeders;

use App\Models\OurConnection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       OurConnection::create([
            'name' => 'ourconnection 1',
            'image' => 'ourconnections/1.jpg',
            'url' => '#',
        ]);

        OurConnection::create([
            'name' => 'ourconnection 2',
            'image' => 'ourconnections/2.jpg',
            'url' => '#',

        ]);

        OurConnection::create([
            'name' => 'ourconnection 3',
            'image' => 'ourconnections/3.jpg',
            'url' => '#',
        ]);
    }
}


// more for this seeder if necessity arises
//     'name' => 'ourconnection 1',
//     'image' => 'ourconnections/1.jpg',
//     'url' => '#',
//     'sort_order' => 1,
//     'status' => 1,
//     'description' => 'Description for connection 1',
