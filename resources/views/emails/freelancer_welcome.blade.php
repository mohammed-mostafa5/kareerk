@component('mail::message')
<a href="{{ config('app.url') }}">
    <img src="{{asset('logo.png')}}" alt="{{ config('app.name') }}">
</a>
<hr>

Thank you for registering with us, your data will be reviewed within 72 hours.

<br>
<br>

Thanks,<br>
<a href="{{ config('app.url') }}">
    {{ config('app.name') }}
</a>
@endcomponent
