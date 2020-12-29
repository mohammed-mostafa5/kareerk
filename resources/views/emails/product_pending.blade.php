@component('mail::message')


Your product is pending.

<strong> Product Name : </strong> {{$product->name}} <br>
<strong> Product Code : </strong> {{$product->code}} <br>
<strong> Product Winner Code : </strong> {{$product->winner->code}} <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
