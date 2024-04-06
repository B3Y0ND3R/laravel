@extends('dashboard.x')

@section('nav')

<div class="item">
    <i class='bx bx-user'></i>
    <a href="/dashboard/employer/manage">Manage Jobs</a>
</div>
<div class="item">
    <i class='bx bx-user'></i>
    <a href="/listings/create">Post a Job</a>
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
            <a href="/dashboard/employer/manage"><h5>Manage Jobs</h5></a>

        </div>
    </div>
    <a href="/dashboard/employer/manage"><i class='bx bx-list-check'></i></a>
</div>
<div class="item">
    <div class="progress">
        <div class="info">
            <a href="/listings/create"><h5>Post a Job</h5></a>
        </div>
    </div>
    <a href="/listings/create"><i class='bx bx-file'></i></a>
</div>
    @endsection