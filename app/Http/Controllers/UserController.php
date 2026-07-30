<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Inertia\Response;

class UserController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return inertia('Users/Index', [
            'users' => User::with('company')->get(),
            'breadCrumbs' => [
                ['label' => 'Users'],
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return inertia('Users/Create', [
            'companies' => Company::all(),
            'breadCrumbs' => [
                ['label' => 'Users', 'href' => route('users.index')],
                ['label' => 'Create'],
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['password'] = 'password';

        User::create($validated);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        return inertia('Users/Show', [
            'user' => $user->load('company'),
            'breadCrumbs' => [
                ['label' => 'Users', 'href' => route('users.index')],
                ['label' => $user->id],
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response
    {
        return inertia('Users/Edit', [
            'user' => $user,
            'companies' => Company::all(),
            'breadCrumbs' => [
                ['label' => 'Users', 'href' => route('users.index')],
                ['label' => $user->id, 'href' => route('users.show', $user)],
                ['label' => 'Edit'],
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
