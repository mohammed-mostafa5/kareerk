@component('mail::message')

Your Balance don't enough for product deposit please recharge your balance.

<strong> Product Name : </strong> {{$product->name}} <br>
<strong> Product Code : </strong> {{$product->code}} <br>
<strong> Your Balance : </strong> {{$owner->balance}} <br>
<strong> Required Deposit : </strong> {{$product->deposit}} <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
