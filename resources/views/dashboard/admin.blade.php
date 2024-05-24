@extends('dashboard.x')

@section('nav')

<div class="item">
    <i class='bx bx-group'></i>
    <a href="/dashboard/admin/users">Users</a>
</div>
<div class="item">
    <i class='bx bx-file'></i>
    <a href="/dashboard/admin/roles">Manage Roles</a>
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
            <a href="/dashboard/admin/users"><h5>Users</h5></a>

        </div>
    </div>
    <a href="/dashboard/admin/users"><i class='bx bx-group'></i></a>
</div>
<div class="item">
    <div class="progress">
        <div class="info">
            <a href="/dashboard/admin/roles"><h5>Manage Roles</h5></a>
        </div>
    </div>
    <a href="/"><i class='bx bx-file'></i></a>
</div>
    @endsection