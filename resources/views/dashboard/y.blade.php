










@extends('dashboard.x')





<div class="separator">
    <div class="info">
        <h3>Actions</h3>
    </div>
    </div>


 <div class="analytics">
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
    @yield('p')
    {{-- <div class="item">
        <div class="progress">
            <div class="info">
                <a href="/"><h5>Users</h5></a>

            </div>
        </div>
        <a href="/"><i class='bx bx-group'></i></a>
    </div>
    <div class="item">
        <div class="progress">
            <div class="info">
                <a href="/"><h5>Manage Roles</h5></a>
            </div>
        </div>
        <a href="/"><i class='bx bxs-file'></i></a>
    </div> --}}
</div>

