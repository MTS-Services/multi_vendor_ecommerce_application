<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class SellerSeeder extends Seeder
{
  public function run(): void
  {

    // Now insert seller
    Seller::create([
      'first_name' => 'Test',
      'last_name' => 'Seller',
      'username' => 'seller',
      'email' => 'seller@dev.com',
      'password' => 'seller@dev.com', // Always hash passwords!
      'email_verified_at' => now(),
      'country_id' => 1,
      'city_id' => 1,
      'hub_id' => 1,
      'operation_area_id' => 1,
    ]);
    Seller::create([
      'first_name' => 'Test',
      'last_name' => 'Seller',
      'username' => 'seller1',
      'email' => 'seller@dev1.com',
      'password' => 'seller@dev1.com', // Always hash passwords!
      'email_verified_at' => now(),
      'country_id' => 1,
      'city_id' => 1,
      'hub_id' => 1,
      'operation_area_id' => 1,
    ]);
    Seller::create([
      'first_name' => 'Test',
      'last_name' => 'Seller',
      'username' => 'seller2',
      'email' => 'seller@dev2.com',
      'password' => 'seller@dev2.com', // Always hash passwords!
      'email_verified_at' => now(),
      'country_id' => 1,
      'city_id' => 1,
      'hub_id' => 1,
      'operation_area_id' => 1,
    ]);
  }
}
