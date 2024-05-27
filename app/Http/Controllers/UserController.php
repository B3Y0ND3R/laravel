<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Application;

use Illuminate\Validation\Rule;

use Str;
use App\Mail\ForgotPasswordMail;
use Mail;
use Hash;
use Auth;
use Storage;

use App\Http\Requests\ResetPassword;

class UserController extends Controller
{
    public function create() {
        return view('users.register');
    }



    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'pic' => 'required',
            'role' => 'required|string|in:admin,employer,applicant'
        ]);
    
        if($request->hasFile('pic')) {
            $formFields['pic'] = $request->file('pic')->store('pics', 'public');
        }
    
        $formFields['password'] = bcrypt($formFields['password']);
    
        $user = User::create($formFields);
    
        $request->session()->put('user', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
            'pic' => $user->pic,
            'cv' => null,
        ]);
        session(['logged_in' => true]);
        $this->authenticate($request);
    
        return redirect('/')->with('message', 'User created and logged in');
    }
    


    public function show(User $user){
        return view('listings.profile',[
            'user' => $user
        ]);
    }

    public function showApplicants()
    {
        $users = User::all();
        $listings=Listing::all();
        $applications=Application::all();
        return view('dashboard.a-users', compact('users','listings','applications'));
    }


    public function showUsers()
    {
        $users = User::all();
        return view('dashboard.role', compact('users'));
    }


    public function showListings($id)
    {
        $user = User::findOrFail($id);
        $listings = $user->listings; 

        return view('dashboard.listings', compact('listings'));
    }

    public function showApplications($id)
    {
        $user = User::findOrFail($id);
        $applications = $user->applications; 

        return view('dashboard.applications', compact('applications', 'user'));
    }



    public function updateRole(Request $request)
{
    $request->validate([
        'new_role.*' => ['required', Rule::in(['admin', 'employer', 'applicant'])],
    ]);

    foreach ($request->new_role as $userId => $newRole) {
        User::where('id', $userId)->update(['role' => $newRole]);
    }

    return redirect()->back()->with('message', 'Roles updated successfully');
}


public function showProfile(){
    $user=User::where('id', session('user.id'));
    return view('users.edit-profile', compact('user'));
}
public function editProfile(Request $request){
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$request->user()->id,
        'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'cv' => 'nullable|mimes:pdf,doc,docx'
    ]);

    $user = User::find($request->user()->id);

    if ($request->hasFile('pic')) {
        $user->pic = $request->file('pic')->store('pics', 'public');
        $sessionData['pic'] = $request->pic;
    } 


    if ($request->hasFile('cv')) {
        $file = $request->file('cv');
        $name = time() . $file->getClientOriginalName();
        $name = preg_replace('/\s+/', '-', $name);
        $path = $file->storeAs('cvs', $name, 'public');
        $user->cv = $path;
        $sessionData['cv'] = $path;
    }


    $sessionData = [
        'id' => $user->id,
        'role' => $user->role,
    ];
    if ($request->filled('name')) {
        $sessionData['name'] = $request->name;
        $user->name = $request->name;
    }
    if ($request->filled('email')) {
        $sessionData['email'] = $request->email;
        $user->email = $request->email;
    }
    if ($request->filled('pic')) {
        $sessionData['pic'] = $request->pic;
    }
    if ($request->filled('cv')) {
        $sessionData['cv'] = $request->cv;
    }

    $request->session()->put('user', $sessionData);
    $user->save();
    
    return redirect()->back()->with('message', 'Profile updated successfully!');
}


public function goToUploadCV() {
    return view('dashboard.upload-cv');
}

public function uploadCv(Request $request)
{
    $request->validate([
        'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
    ]);

    $user = Auth::user(); 

    if ($request->hasFile('cv')) {
        $file = $request->file('cv');
        $name = time() . $file->getClientOriginalName();
        $name = preg_replace('/\s+/', '-', $name);


        $path = $file->storeAs('cvs', $name, 'public');


        $user->cv = $path;
        $user->save();

        return back()->with('message', 'CV uploaded successfully.');
    }

    return back()->with('message', 'Failed to upload CV.');
}

public function showCv(User $user)
{
    return view('dashboard.show-cv', compact('user'));
}



    

public function logout(Request $request) {
    $request->session()->forget('user');
    //Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message', 'You have been logged out!');
}


    public function login() {
        return view('users.login');
    }

    public function forgot() {
        return view('users.forgot');
    }

    public function forgot_post(Request $request) {
        $count=User::where('email', '=', $request->email)->count();
        if($count>0){
            $user=User::where('email', '=', $request->email)->first();
            //$user->remember_token=Str::random(50);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect('/forgot')->with('message', 'Password reset email sent'); 
        }
        else{
            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }
    }


    public function getReset(Request $request, $token){
        $user=User::where('remember_token', '=', $token);
        if($user->count()==0){
            abort(403);
        }
        $user=$user->first();
        $data['token']=$token;
        return view('users.reset', $data);
    }

    public function postReset($token, ResetPassword $request){

        // $request->validate([
        //     'password' => ['required', 'string', 'min:6', 'confirmed'],
        // ]);
        $user=User::where('remember_token', '=', $token);
        if($user->count()==0){
            abort(403);
        }
        $user=$user->first();
        $user->password=Hash::make($request->password);
        $user->remember_token=Str::random(50);
        $user->save();
        return redirect('/login')->with('message', 'Password Reset Successfully');
    }


    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        $user = User::where('email', $formFields['email'])->first();
        //$remember = $request->filled('remember');
        if(Auth::attempt($formFields)) {
            session(['logged_in' => true]);
            $request->session()->put('user', [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'pic' => $user->pic,
                'cv' => $user->cv,
            ]);
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
    

    public function totalUsers(){

        $users = User::all();
        $listings=Listing::all();
        $applications=Application::all();
        return view('total.users', compact('users','listings','applications'));
    }


    public function destroy($id)
{
    $user = User::findOrFail($id);
    if (Auth::user()->role!== 'admin') {
        abort(403, 'Unauthorized action.');
    }
    $user->delete();
    return redirect()->back()->with('success', 'User deleted successfully.');
}

}
