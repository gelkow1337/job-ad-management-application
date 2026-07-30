<?php

namespace App\Http\Controllers;

use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreJobListingRequest;
use App\Http\Requests\UpdateJobListingRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\JobListing;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

class JobListingController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(JobListing::class, 'jobListing');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return inertia('JobListings/Index', [
            'jobListings' => JobListing::with('company', 'categories')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return inertia('JobListings/Create', [
            'companies' => Company::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobListingRequest $request): RedirectResponse
    {
        JobListing::create($request->validated());

        return redirect()->route('job-listings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobListing $jobListing): Response
    {
        return inertia('JobListings/Show', [
            'jobListing' => $jobListing->load('company', 'categories'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobListing $jobListing): Response
    {
        return inertia('JobListings/Edit', [
            'jobListing' => $jobListing->load('categories'),
            'companies' => Company::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobListingRequest $request, JobListing $jobListing): RedirectResponse
    {
        $jobListing->update($request->validated());
        $jobListing->categories()->sync($request->input('categories', []));

        return redirect()->route('job-listings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobListing $jobListing): RedirectResponse
    {
        $jobListing->delete();

        return redirect()->route('job-listings.index');
    }
}
