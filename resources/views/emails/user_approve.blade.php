@component('mail::message')

Congratulations, You are approved from admin and you can login to mazadii.net now.

<strong>User Code : </strong> {{$user->code}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
