@component('mail::message')
<a href="{{ config('app.url') }}">
    <img src="{{asset('logo.png')}}" alt="{{ config('app.name') }}">
</a>
<hr>
Congratulations, You are subscribed successfuly.

<strong>Subscription Fees: </strong> {{ $amount }}$ <br>
<strong>Your New Balance: </strong> {{$user->balance}}$

<br>
<br>

Thanks,<br>
<a href="{{ config('app.url') }}">
    {{ config('app.name') }}
</a>
@endcomponent
