@component('mail::message')
<a href="{{ config('app.url') }}">
    <img src="{{asset('logo.png')}}" alt="{{ config('app.name') }}">
</a>
<hr>

Congratulations, You are registered with us and you can <b><a href="{{ config('app.url') }}/auth/signin">Login</a></b> to {{ config('app.name') }} now.

<br>
<br>

Thanks,<br>
<a href="{{ config('app.url') }}">
    {{ config('app.name') }}
</a>
@endcomponent
