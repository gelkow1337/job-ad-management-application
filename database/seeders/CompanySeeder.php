<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

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
