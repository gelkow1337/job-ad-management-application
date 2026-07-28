<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = Company::factory()->createMany([
            ['name' => 'Company A', 'website' => 'company-a.com', 'description' => 'Company A description...', 'number_of_employees' => 20],
            ['name' => 'Company B', 'website' => 'company-b.com', 'description' => 'Company B description...', 'number_of_employees' => 350],
        ]);
    }
}
