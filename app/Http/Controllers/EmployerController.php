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

            return view('dashboard.employer');

    }

    
public function totalEmployers(){
    $users = User::where('role', 'employer')->get();
    $listings=Listing::all();
    $applications=Application::all();
    return view('total.employers', compact('users','listings','applications'));
}
}
