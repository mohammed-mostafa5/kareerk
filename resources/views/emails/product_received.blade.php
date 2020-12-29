@component('mail::message')


The product has been received .

<strong> Product Name : </strong> {{$product->name}} <br>
<strong> Product Code : </strong> {{$product->code}} <br>
<strong> Product Winner Code : </strong> {{$product->winner->code}} <br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
