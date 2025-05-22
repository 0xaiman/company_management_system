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
            'logo' => 'https://cdn.pixabay.com/photo/2023/02/01/00/54/company-7759278_1280.png',
            'website_url' => 'https://dummyurl1.com',
        ]);

        Company::create([
            'name' => 'Company 2',
            'email' => 'company2@mail.com',
            'logo' => 'https://cdn.pixabay.com/photo/2018/04/01/09/28/image-3280358_1280.jpg',
            'website_url' => 'https://dummyurl2.com',
        ]);
    }
}
