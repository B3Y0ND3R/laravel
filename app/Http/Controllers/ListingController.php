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

class ListingController extends Controller
{
    public function index(){
        // dd(request('tag'));
        return view('listings.index', [
            // 'heading' => 'Latest listings',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(2)
        ]);
    }

    public function show(Listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);
    }

    public function create(){
        return view('listings.create');
    }

      // Store Listing Data
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

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }


    // Show Edit Form
    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing) {
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
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

    // Delete Listing
    public function destroy(Listing $listing) {
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        if($listing->logo && Storage::disk('public')->exists($listing->logo)) {
            Storage::disk('public')->delete($listing->logo);
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

// Manage Listings
public function handle() {
    return view('listings.handle');
    //, ['listings' => auth()->user()->listings()->get()]);
}


    // // Manage Listings
    // public function manage() {
    //     return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    // }


    // Manage Listings
    public function manage() {
        return view('dashboard.e-manage', ['listings' => auth()->user()->listings()->get()]);
    }


//     public function apply(Request $request, Listing $listing)
// {
//     $application = new Application;
//     $application->user_id = auth()->user()->id;
//     $application->listing_id = $listing->id;
//     $application->employer_id = $listing->user_id; // Assuming the listing model has a user_id field for the employer
//     $application->save();

//     // Send notification to the employer
//     // This part depends on how you handle notifications in your application
//     // For example, using Laravel's built-in notifications system
//     $listing->user->notify(new JobApplicationReceived($application));

//     return redirect()->back()->with('success', 'Application submitted successfully!');
// }

// public function apply(Request $request) {
//     $formFields = $request->validate([
//         'user_id' => 'required',
//         'listing_id' => 'required',
//         'employer_id' => 'required'
//     ]);


//     // Create User
//     $user = User::create($formFields);

//     // Login
//     auth()->login($user);

//     return redirect('/')->with('message', 'User created and logged in');
// }
public function applyJob(Request $request) {
    $id = $request->id;

    $listing = Listing::where('id',$id)->first();

    // If job not found in db
    if ($listing == null) {
        $message = 'Listing does not exist.';
        session()->flash('error',$message);
        return response()->json([
            'status' => false,
            'message' => $message
        ]);
    }

    // you can not apply on your own job
    $employer_id = $listing->user_id;

    if ($employer_id == Auth::user()->id) {
        $message = 'You can not apply on your own job.';
        session()->flash('error',$message);
        return response()->json([
            'status' => false,
            'message' => $message
        ]);
    }

    // You can not apply on a job twise
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
    // $application->created_at= now();
    $application->save();


    // Send Notification Email to Employer
    $employer = User::where('id',$employer_id)->first();
    
    $mailData = [
        'employer' => $employer,
        'user' => Auth::user(),
        'job' => $listing,
    ];

    // Mail::to($employer->email)->send(new JobNotificationEmail($mailData));

    $message = 'You have successfully applied.';

    session()->flash('success',$message);

    return response()->json([
        'status' => true,
        'message' => $message
    ]);
}

}
