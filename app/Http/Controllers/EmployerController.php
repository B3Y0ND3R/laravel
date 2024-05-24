<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Listing;
use App\Models\Application;

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

    
public function totalEmployers(){
    $users = User::where('role', 'employer')->get();
    $listings=Listing::all();
    $applications=Application::all();
    return view('total.employers', compact('users','listings','applications'));
}
}
