<?php

namespace Database\Seeders;

use App\Models\OperationSubArea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperationSubAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OperationSubArea::create([
            'operation_area_id' => 1,
            'name' => 'Operation Area 1',
            'slug' => 'operation-area-1',
        ]);

        OperationSubArea::create([
            'operation_area_id' => 2,
            'name' => 'Operation Area 2',
            'slug' => 'operation-area-2',
        ]);
    }
}
