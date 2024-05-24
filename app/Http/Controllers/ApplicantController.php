<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Listing;
use App\Models\Application;

class ApplicantController extends Controller
{
   
        public function dashboard()
    {
        if (Auth::check() && session('user.role') == 'applicant') {
            return view('dashboard.applicant');
        } else {
            return redirect('/')->with('error', 'Unauthorized action.');
        }
    }

    
public function totalApplicants(){
    $users = User::where('role', 'applicant')->get();
    $listings=Listing::all();
    $applications=Application::all();
    return view('total.applicants', compact('users','listings','applications'));
}
}

