<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobListing;
use App\Models\Company;
use App\Models\Category;

class JobListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = Company::all();
        $categories = Category::all();

        $jobListings = JobListing::factory()->createMany([
            ['company_id' => fn () => $companies->random()->id, 'title' => 'Job A', 'description' => 'Job A description...', 'location' => 'City A', 'Salary' => '50000'],
            ['company_id' => fn () => $companies->random()->id, 'title' => 'Job B', 'description' => 'Job B description...', 'location' => 'City B', 'Salary' => '60000'],
        ]);

        foreach ($jobListings as $jobListing) {
            $randomCategories = $categories->random();
            $jobListing->categories()->attach($randomCategories);
        }
    }
}
