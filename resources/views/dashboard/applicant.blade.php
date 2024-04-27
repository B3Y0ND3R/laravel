@extends('dashboard.x')


@section('nav')

<div class="item">
    <i class='bx bx-user'></i>
    <a href="/dashboard/applicant/applied">Jobs applied</a>
</div>
<div class="item">
    <i class='bx bx-user'></i>
    <a href="/dashboard/applicant/request">Request Role Change</a>
</div>

   

@endsection

@section('p')
<div class="item">
  <div class="progress">
      <div class="info">
          <a href="/"><h5>Home</h5></a>
      </div>
  </div>
  <a href="/"><i class='bx bx-home'></i></a>
</div>
<div class="item">
  <div class="progress">
      <div class="info">
          <a href="/"><h5>Profile</h5></a>
      </div>
      
  </div>
  <a href="/"><i class='bx bx-user'></i></a>
</div>
<div class="item">
  <div class="progress">
      <div class="info">
          <a href="/dashboard/applicant/applied"><h5>Apply for a Job</h5></a>

      </div>
  </div>
  <a href="/dashboard/applicant/applied"><i class='bx bx-list-check'></i></a>
</div>
<div class="item">
  <div class="progress">
      <div class="info">
          <a href="/dashboard/applicant/request"><h5>Request Role Change</h5></a>
      </div>
  </div>
  <a href="/dashboard/applicant/request"><i class='bx bx-file'></i></a>
</div> 
@endsection