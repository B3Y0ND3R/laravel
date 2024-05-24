<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::check() && session('user.role') == 'admin' && session('logged_in')) {
            return view('dashboard.admin');
        } else {
            return redirect('/')->with('message', 'Unauthorized action.');
        }
    }

}
