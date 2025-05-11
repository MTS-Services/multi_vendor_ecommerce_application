<?php

namespace Database\Seeders;

use App\Models\TaxRate;
use App\Models\TaxClass;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaxRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaxRate::create([
            'sort_order' => 1,
            'name' => 'GST',
            'tax_class_id' => 1,
            'country_id' => 1,
            'city_id' => 2,
            'rate' => 18.00,
            'priority' => 0,
            'compound' => 0,
        ]);
    }
}
