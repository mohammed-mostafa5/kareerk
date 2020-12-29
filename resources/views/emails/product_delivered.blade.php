@component('mail::message')




The product has been delivered .

<strong> Product Name : </strong> {{$product->name}} <br>
<strong> Product Code : </strong> {{$product->code}} <br>
<strong> Product Owner Code : </strong> {{$product->owner->code}} <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
