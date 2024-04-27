<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
   
        public function dashboard()
    {
        if (Auth::check() && Auth::user()->role == 'applicant') {
            return view('dashboard.applicant');
        } else {
            return redirect('/')->with('error', 'Unauthorized action.');
        }
    }
    }

