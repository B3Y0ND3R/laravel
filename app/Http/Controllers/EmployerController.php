<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function dashboard()
    {
        if (Auth::check() && Auth::user()->role == 'employer') {
            return view('dashboard.employer');
        } else {
            return redirect('/')->with('error', 'Unauthorized action.');
        }
    }
}
