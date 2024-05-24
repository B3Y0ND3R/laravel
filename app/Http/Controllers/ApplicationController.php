<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use Illuminate\Validation\Rule;

use App\Models\Application;
use App\Notifications\JobApplicationReceived;

use Str;
use App\Mail\JobNotificationMail;
use App\Mail\ApplicationNotificationMail;
use Mail;
use Hash;
use Auth;

class ApplicationController extends Controller
{
  // Store Listing Data
  public function store(Request $request, Listing $listing) {
    // dd($request->file('logo'));

    // Log::info('Apply method called');
    // $formFields = $request->validate([
    //     'listing_id' => 'required',
    //     'employer_id' => 'required'
    // ]);



    $formFields['user_id'] = auth()->id();
    $formFields['listing_id'] = $listing->id;
    $formFields['employer_id'] = $listing->user_id;
    

    Application::create($formFields);

  //   $mailData = [
  //     'employer' => $employer,
  //     'user' => Auth::user(),
  //     'job' => $job,
  // ];
  $user = auth()->user();
  $employer=User::where('id', '=', $listing->user_id)->first();


  Mail::to($user->email)->send(new JobNotificationMail($user,$listing));
  Mail::to($employer->email)->send(new ApplicationNotificationMail($employer,$user));

    return redirect('/')->with('message', 'Listing created successfully!');
}

// public function store(Request $request) {
//   // dd($request->file('logo'));
//   $formFields = $request->validate([
//       'title' => 'required',
//       'company' => ['required', Rule::unique('listings', 'company')],
//       'location' => 'required',
//       'website' => 'required',
//       'email' => ['required', 'email'],
//       'tags' => 'required',
//       'description' => 'required',
//       'logo' => 'required'
//   ]);

//   if($request->hasFile('logo')) {
//       $formFields['logo'] = $request->file('logo')->store('logos', 'public');
//   }

//   $formFields['user_id'] = auth()->id();

//   Listing::create($formFields);

//   return redirect('/')->with('message', 'Listing created successfully!');
// }


// public function applied() {
//   $user = auth()->user();
//   $applications = $user->applications()->get();
//   $listings = $user->listings()->get();

//   return view('applications.applied', [
//       'applications' => $applications,
//       'listings' => $listings
//   ]);
// }

public function applied() {
  $user = auth()->user();
  $applications = $user->applications; 
  $listings = Listing::all(); 

  return view('applications.applied', compact('applications', 'listings'));
}


public function show($listingId)
{
  $listing = Listing::with('applications.user')->find($listingId);
  return view('applications.users', compact('listing'));
}


}



