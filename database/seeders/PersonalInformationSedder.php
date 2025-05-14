<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\PersonalInformation;
use App\Models\Seller;
use Faker\Provider\ar_EG\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalInformationSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PersonalInformation::create([
            'profile_id' => 1,
            'profile_type' => Admin::class,
            'dob' => '1990-01-01',
            'gender' => PersonalInformation::GENDER_MALE,
            'emergency_phone' => '1234567890',
            'father_name' => 'John Doe',
            'mother_name' => 'Jane Doe',
            'nationality' => 'American',
            'bio' => 'Hello, I am John Doe.',
        ]);
        PersonalInformation::create([
            'profile_id' => 2,
            'profile_type' => Seller::class,
            'dob' => '1990-01-01',
            'gender' => PersonalInformation::GENDER_MALE,
            'emergency_phone' => '1234567890',
            'father_name' => 'Jihad Doe',
            'mother_name' => 'Jihad Doe',
            'nationality' => 'Austrolian',
            'bio' => 'Hello, I am jihad Doe.',
        ]);
    }
}
