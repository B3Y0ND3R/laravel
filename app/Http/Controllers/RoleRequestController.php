<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleRequest;
use Illuminate\Support\Facades\Auth;

class RoleRequestController extends Controller
{

    public function seeEmp(){
        return view('dashboard.e-req');
    }

    public function seeApp(){
        return view('dashboard.app-req');
    }
    public function store(Request $request)
    {
        $formFields=$request->validate([
            'requested_role' => 'required|in:employer,applicant',
        ]);

        $formFields['user_id'] = Auth::user()->id;
        $formFields['current_role'] = Auth::user()->role;

RoleRequest::create($formFields);


        return redirect()->back()->with('message', 'Role change request submitted successfully.');
    }

    public function index()
    {
        $roleRequests = RoleRequest::with('user')->get();

        return view('dashboard.a-role', compact('roleRequests'));
    }

    public function update(RoleRequest $roleRequest)
{
    $user = $roleRequest->user;
    $user->role = $roleRequest->requested_role;
    $user->save();

    $roleRequest->delete();

    return redirect()->back()->with('message', 'User role updated successfully.');
}

public function destroy($id)
{
    $roleRequest = RoleRequest::findOrFail($id);
    $roleRequest->delete();

    return redirect()->route('admin.role_requests.index')->with('success', 'Role request deleted successfully.');
}

}

