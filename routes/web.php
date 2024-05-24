<?php

use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployerController;

Route::get('/ab', function () {
    return view('ran');
});
Route::get('/l', function () {
    return view('dashboard.l');
});

Route::get('/forgot', [UserController::class, 'forgot']);

Route::post('/forgot-password', [UserController::class, 'forgot_post']);



Route::get('/reset/{token}', [UserController::class, 'getReset']);
Route::post('/reset_post/{token}', [UserController::class, 'postReset']);


//Route::get('/dashboard/admin', [AdminController::class, 'dashboard']);
Route::get('/dashboard/admin/roles', [UserController::class, 'showUsers']);

Route::put('/dashboard/admin/update-role', [UserController::class, 'updateRole']);



//Route::get('/dashboard/applicant', [ApplicantController::class, 'dashboard']);


//Route::get('/dashboard/employer', [EmployerController::class, 'dashboard']);

Route::get('dashboard/admin',[AdminController::class,'dashboard'])->name('admin.dashboard')->middleware('role:admin');

Route::get('dashboard/employer',[EmployerController::class,'dashboard'])->name('employer.dashboard')->middleware('role:employer');
Route::get('dashboard/applicant',[ApplicantController::class,'dashboard'])->name('applicant.dashboard')->middleware('role:applicant');

Route::get('/dashboard/employer/manage', [ListingController::class, 'manage'])->middleware('auth');

Route::get('/dashboard/admin/users/{id}/listings', [UserController::class, 'showListings']);

Route::get('/dashboard/admin/users/{id}/applications', [UserController::class, 'showApplications']);

Route::get('/dashboard/applicant/upload-cv', [UserController::class, 'goToUploadCV']);

Route::post('/dashboard/applicant/show-cv', [UserController::class, 'uploadCV']);




Route::get('/dashboard/applicant/applied', [ApplicationController::class, 'applied']);

Route::get('/', [ListingController::class, 'index']);




Route::get('/listings/create', [ListingController::class, 'create']);

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
Route::get('/register', [UserController::class, 'create']);

Route::get('/edit-profile', [UserController::class, 'showProfile']);
Route::post('/updated-profile', [UserController::class, 'editProfile']);

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



// profile
Route::get('/users/{user}', [UserController::class, 'show']);

Route::get('/listings/{listing}/apply',[ApplicationController::class,'store']);


Route::get('/dashboard/admin/users', [UserController::class, 'showApplicants']);



Route::get('/totalUsers', [UserController::class, 'totalUsers']);
Route::get('/totalListings', [ListingController::class, 'totalListings']);
Route::get('/totalCompanies', [ListingController::class, 'totalCompanies']);
Route::get('/totalEmployers', [EmployerController::class, 'totalEmployers']);
Route::get('/totalApplicants', [ApplicantController::class, 'totalApplicants']);
