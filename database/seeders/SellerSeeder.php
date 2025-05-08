<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seller::create([
            'first_name' => 'Test',
            'last_name' => 'Seller',
            'username' => 'seller',
            'email' => 'seller@dev.com',
            'password' => 'seller@dev.com',
            'email_verified_at' => now(),
            'is_verify' => 1
        ]);
    }
}
