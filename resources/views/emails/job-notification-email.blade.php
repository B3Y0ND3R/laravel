@component('mail::message')
Hi, {{ $user->name }}.

<p>We've received your application.<br>
Please wait for our confirmation. We will get in touch with you soon.
</p>


@component('mail::button', ['url' => url('listings/'.$listing->id)])
Reset Password  
@endcomponent

Thanks, <br>
{{ config('app.name') }}   
@endcomponent
