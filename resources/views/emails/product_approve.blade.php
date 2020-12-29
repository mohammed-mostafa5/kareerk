@component('mail::message')


Congratulations, Your product has been approved successfuly.

<strong> Product Name : </strong> {{$product->name}} <br>
<strong> Product Code : </strong> {{$product->code}} <br>
<strong> Required Deposit : </strong> {{$product->deposit}} <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
