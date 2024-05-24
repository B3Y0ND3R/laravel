@component('mail::message')
Hi, {{ $employer->name }}.

<p>There was an application issued on your posted job.<br>
The applicant profile link along with CV is attached below.
</p>

@php
    $cvUrl = asset('storage/'. $user->cv);
@endphp

@component('mail::button', ['url' => url('users/'.$user->id)])
Applicant Profile 
@endcomponent

@component('mail::button', ['url' => url($cvUrl)])
View CV 
@endcomponent

Thanks, <br>
{{ config('app.name') }}   
@endcomponent
