<?php

namespace Database\Seeders;

use App\Models\ProductAttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductAttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductAttributeValue::create([
            'product_attribute_id' => 1,
            'value' => 'Black',
        ]);
        ProductAttributeValue::create([
            'product_attribute_id' => 1,
            'value' => 'Red',
        ]);
        ProductAttributeValue::create([
            'product_attribute_id' => 2,
            'value' => 'XL',
        ]);
        ProductAttributeValue::create([
            'product_attribute_id' => 2,
            'value' => 'XXL',
        ]);
        ProductAttributeValue::create([
            'product_attribute_id' => 3,
            'value' => '500',
        ]);
        ProductAttributeValue::create([
            'product_attribute_id' => 3,
            'value' => '1000',
        ]);
        ProductAttributeValue::create([
            'product_attribute_id' => 4,
            'value' => 'Cotton',
        ]);
        ProductAttributeValue::create([
            'product_attribute_id' => 4,
            'value' => 'Polyester',
        ]);
    }
}
