<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Inertia\Response;

class CategoryController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return inertia('Categories/Index', [
            'categories' => Category::get(),
            'breadCrumbs' => [
                ['label' => 'Categories']
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return inertia('Categories/Create', [
            'breadCrumbs' => [
                ['label' => 'Categories', 'href' => route('categories.index')],
                ['label' => 'Create'],
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): Response
    {
        return inertia('Categories/Show', [
            'category' => $category,
            'breadCrumbs' => [
                ['label' => 'Categories', 'href' => route('categories.index')],
                ['label' => $category->id],
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): Response
    {
        return inertia('Categories/Edit', [
            'category' => $category,
            'breadCrumbs' => [
                ['label' => 'Categories', 'href' => route('categories.index')],
                ['label' => $category->id, 'href' => route('categories.show', $category)],
                ['label' => 'Edit'],
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
