<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Index');

Route::resource('users', UserController::class)
    ->names('users')
    ->parameters(['users' => 'user']);

Route::resource('companies', CompanyController::class)
    ->names('companies')
    ->parameters(['companies' => 'company']);

Route::resource('jobs', JobListingController::class)
    ->names('job-listings')
    ->parameters(['jobs' => 'jobListing']);

Route::resource('categories', CategoryController::class)
    ->names('categories')
    ->parameters(['categories' => 'category']);
