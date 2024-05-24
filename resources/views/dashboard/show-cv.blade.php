@extends('dashboard.x')


@section('nav')

<div class="item">
    <i class='bx bx-user'></i>
    <a href="/dashboard/applicant/applied">Jobs applied</a>
</div>
<div class="item">
    <i class='bx bx-user'></i>
    <a href="/dashboard/applicant/upload-cv">Upload CV</a>
</div>

   

@endsection

@section('p')

<a href="{{ asset('storage/' . $user->cv) }}" target="_blank">View CV</a>




  
@endsection
