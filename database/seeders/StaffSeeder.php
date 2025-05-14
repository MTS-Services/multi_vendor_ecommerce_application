<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           Staff::create([
            'first_name' => 'Test',
            'last_name' => 'Staff',
            'hub_id' => 1,
            'username' => 'staff',
            'email' => 'staff@dev.com',
            'password' => 'staff@dev.com',
        ]);
    }
}
