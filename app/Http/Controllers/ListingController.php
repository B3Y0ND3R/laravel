<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

use Illuminate\Validation\Rule;

use App\Models\Application;
use App\Notifications\JobApplicationReceived;

use Auth;
use DB;

class ListingController extends Controller
{
    public function index(){
        $totalUsers = User::count();
        $totalListings = Listing::count();
        $totalApplications = Application::count();
        $totalEmployers = DB::table('users')
            ->where('role', 'employer')
            ->count();
        $totalApplicants = DB::table('users')
            ->where('role', 'applicant')
            ->count();
        $totalCompanies = Listing::select('company_id')->distinct()->count();

        //return view('dashboard', compact('totalUsers', 'totalListings', 'totalApplications', 'totalEmployers', 'totalApplicants'));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(2)
        ],compact('totalUsers', 'totalListings', 'totalApplications', 'totalEmployers', 'totalApplicants','totalCompanies'));
    }

    public function show(Listing $listing){
        $hasApplied = Application::where([
            'user_id' => auth()->id(),
            'listing_id' => $listing->id
        ])->exists();
        return view('listings.show',compact('listing', 'hasApplied'));
    }

    public function create(){
        if(session('user.role')=='employer'){
            return view('listings.create');
        }
        else{
            return redirect('/')->with('message', 'You cannot post a job!');
        }
        
    }


      public function store(Request $request) {
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
            'logo' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = Auth::user()->id;

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }



    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }


    public function update(Request $request, Listing $listing) {

        if($listing->user_id != Auth::user()->id) {
            abort(403, 'Unauthorized Action');
        }
        
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }

    public function destroy(Listing $listing) {
        if($listing->user_id != Auth::user()->id) {
            abort(403, 'Unauthorized Action');
        }
        
        if($listing->logo && Storage::disk('public')->exists($listing->logo)) {
            Storage::disk('public')->delete($listing->logo);
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }


public function handle() {
    return view('listings.handle');

}


    public function manage() {
        return view('dashboard.e-manage', ['listings' => Auth::user()->listings()->get()]);
    }



public function applyJob(Request $request) {
    $id = $request->id;

    $listing = Listing::where('id',$id)->first();


    if ($listing == null) {
        $message = 'Listing does not exist.';
        session()->flash('error',$message);
        return response()->json([
            'status' => false,
            'message' => $message
        ]);
    }

    $employer_id = $listing->user_id;

    if ($employer_id == Auth::user()->id) {
        $message = 'You can not apply on your own job.';
        session()->flash('error',$message);
        return response()->json([
            'status' => false,
            'message' => $message
        ]);
    }

    $ApplicationCount = Application::where([
        'user_id' => Auth::user()->id,
        'listing_id' => $id
    ])->count();
    
    if ($ApplicationCount > 0) {
        $message = 'You already applied on this job.';
        session()->flash('error',$message);
        return response()->json([
            'status' => false,
            'message' => $message
        ]);
    }

    $application = new Application();
    $application->listing_id = $id;
    $application->user_id = Auth::user()->id;
    $application->employer_id = $employer_id;
    $application->save();


    $employer = User::where('id',$employer_id)->first();
    
    $mailData = [
        'employer' => $employer,
        'user' => Auth::user(),
        'job' => $listing,
    ];


    $message = 'You have successfully applied.';

    session()->flash('success',$message);

    return response()->json([
        'status' => true,
        'message' => $message
    ]);
}

public function totalListings(){
    $users = User::all();
    $listings=Listing::all();
    $applications=Application::all();
    return view('total.listings', compact('users','listings','applications'));
}
 
public function totalCompanies(){
    $users = User::all();
    $listings=Listing::all();
    $applications=Application::all();
    return view('total.companies', compact('users','listings','applications'));
}
}
