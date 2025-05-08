<?php

namespace Database\Seeders;

use App\Models\OfferBanner;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            OfferBannerSeeder::class,
        ]);
    }
}
