<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Inertia\Response;

class CompanyController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Company::class, 'company');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return inertia('Companies/Index', [
            'companies' => Company::get(),
            'breadCrumbs' => [
                ['label' => 'Companies'],
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return inertia('Companies/Create', [
            'breadCrumbs' => [
                ['label' => 'Companies', 'href' => route('companies.index')],
                ['label' => 'Create'],
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        Company::create($request->validated());

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company): Response
    {
        return inertia('Companies/Show', [
            'company' => $company,
            'breadCrumbs' => [
                ['label' => 'Companies', 'href' => route('companies.index')],
                ['label' => $company->id],
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company): Response
    {
        return inertia('Companies/Edit', [
            'company' => $company,
            'breadCrumbs' => [
                ['label' => 'Companies', 'href' => route('companies.index')],
                ['label' => $company->id, 'href' => route('companies.show', $company)],
                ['label' => 'Edit'],
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company): RedirectResponse
    {
        $company->update($request->validated());

        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();

        return redirect()->route('companies.index');
    }
}
