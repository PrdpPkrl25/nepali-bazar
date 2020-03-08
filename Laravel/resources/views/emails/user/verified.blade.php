@component('mail::message')
# User Verified

Welcome {{$user->name}} <br>
Your Email has been Verified

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
