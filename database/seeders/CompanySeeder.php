<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Company 1',
            'email' => 'company1@mail.com',
            'website_url' => 'https://dummyurl1.com',
        ]);

        Company::create([
            'name' => 'Company 2',
            'email' => 'company2@mail.com',
            'website_url' => 'https://dummyurl2.com',
        ]);
    }
}
