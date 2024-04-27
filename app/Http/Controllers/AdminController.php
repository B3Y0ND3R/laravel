<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('dashboard.admin');
        } else {
            return redirect('/')->with('error', 'Unauthorized action.');
        }
    }

}
