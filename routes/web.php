<?php

use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;

Route::get('/l', function () {
    return view('dashboard.l');
});

Route::get('/dashboard/admin', function () {
    return view('dashboard.admin');
});

Route::get('/dashboard/applicant', function () {
    return view('dashboard.applicant');
});

Route::get('/dashboard/employer', function () {
    return view('dashboard.employer');
});



Route::get('/dashboard/employer/manage', [ListingController::class, 'manage'])->middleware('auth');


Route::get('/', [ListingController::class, 'index']);




Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');




//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

Route::get('/applications/{listing}/users', [ApplicationController::class, 'show']);

// Handle Listings
Route::get('/listings/applied', [ApplicationController::class, 'applied']);

// Handle Listings
Route::get('/listings/handle', [ListingController::class, 'handle']);
//->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



// profile
Route::get('/users/{user}', [UserController::class, 'show']);

Route::get('/listings/{listing}/apply',[ApplicationController::class,'store']);


Route::get('/dashboard/admin/users', [UserController::class, 'showApplicants']);

Route::get('/dashboard', function () {
    return view('dashboard.x');
});

// Route::get('/dashboard/actions', function () {
//     return view('dashboard.dashboard');
// });

