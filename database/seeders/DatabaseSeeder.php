<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TaxClass;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
            RoleHasPermissionSeeder::class,
            EmailTemplateSeeder::class,
            ApplicationSettingSeeder::class,


            SellerSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,

            CountrySeeder::class,
            BannerSeeder::class,
            StateSeeder::class,
            CitySeeder::class,

            ProductAttributeSeeder::class,
            ProductAttributeValueSeeder::class,
            OperationAreaSeeder::class,
            OperationSubAreaSeeder::class,

            OfferBannerSeeder::class,
            BrandSeeder::class,
            TaxClassSeeder::class,
        ]);
    }
}
