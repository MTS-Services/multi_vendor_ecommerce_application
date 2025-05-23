<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'New',
            'last_name' => 'User',
            'username' => 'user',
            'email' => 'user@dev.com',
            'password' => 'user@dev.com',
            'email_verified_at' => now(),
            'is_verify' => 1
        ]);
    }
}
