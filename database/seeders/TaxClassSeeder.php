<?php

namespace Database\Seeders;

use App\Models\TaxClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaxClass::create([
            'name' => 'Tax Class 1',
            'description' => 'Tax Class 1',
        ]);
        TaxClass::create([
            'name' => 'Tax Class 2',
            'description' => 'Tax Class 2',
        ]);
        TaxClass::create([
            'name' => 'Tax Class 2',
            'description' => 'Tax Class 2',
        ]);
    }
}
