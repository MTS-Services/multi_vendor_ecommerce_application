<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Product 1',
            'slug' => 'product-1',
            'seller_id' => 1,
            'brand_id' => 1,
            'category_id' => 1,
            'tax_class_id' => 1,
            'sku'=>'sku-1'
        ]);
        Product::create([
            'name' => 'Product 2',
            'slug' => 'product-2',
            'seller_id' => 2,
            'brand_id' => 2,
            'category_id' => 2,
            'tax_class_id' => 2,
            'sku'=>'sku-2'

        ]);
        Product::create([
            'name' => 'Product',
            'slug' => 'product',
            'seller_id' => 1,
            'brand_id' => 1,
            'category_id' => 1,
            'tax_class_id' => 1,
            'sku'=>'sku-3'

        ]);
    }
}
