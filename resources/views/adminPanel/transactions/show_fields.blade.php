<!-- product Field -->
<div class="form-group show">
    {!! Form::label('product', __('models/reviews.fields.product').':') !!}
    <span>{{ $review->product->name ?? ''}}</span>
</div>

<!-- user Field -->
<div class="form-group show">
    {!! Form::label('user', __('models/reviews.fields.user').':') !!}
    <span>{{ $review->user->first_name ?? ''}} {{ $review->user->last_name ?? ''}}</span>
</div>


<!-- comment Field -->
<div class="form-group show">
    {!! Form::label('comment', __('models/reviews.fields.comment').':') !!}
    <span>{{ $review->comment }}</span>
</div>
