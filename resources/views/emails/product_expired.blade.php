@component('mail::message')


Your product is expired.

<strong> Product Name : </strong> {{$product->name}} <br>
<strong> Product Code : </strong> {{$product->code}} <br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
