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

  public function store(Request $request, Listing $listing) {


    $formFields['user_id'] = Auth::user()->id;
    $formFields['listing_id'] = $listing->id;
    $formFields['employer_id'] = $listing->user_id;
    

    Application::create($formFields);

  $user = Auth::user();
  $employer=User::where('id', '=', $listing->user_id)->first();


  Mail::to($user->email)->send(new JobNotificationMail($user,$listing));
  Mail::to($employer->email)->send(new ApplicationNotificationMail($employer,$user));

    return redirect('/')->with('message', 'Listing created successfully!');
}


public function applied() {
  $user = Auth::user();
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



