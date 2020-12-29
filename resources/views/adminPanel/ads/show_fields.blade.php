<!-- Photo Field -->
<div class="form-group">
    {!! Form::label('photo', __('models/ads.fields.photo').':') !!}

    <img src="{{asset('uploads/images/thumbnail/'. $ads->photo)}}" class="" style="width: 250px" alt="">

</div>

<!-- Width Field -->
<div class="form-group">
    {!! Form::label('width', __('models/ads.fields.width').':') !!}
    <span>{{ $ads->width }}</span>
</div>

<!-- Height Field -->
<div class="form-group">
    {!! Form::label('height', __('models/ads.fields.height').':') !!}
    <span>{{ $ads->height }}</span>
</div>

<!-- Page Field -->
<div class="form-group">
    {!! Form::label('page', __('models/ads.fields.page').':') !!}
    <span>{{ $ads->page }}</span>
</div>

<!-- Link Field -->
<div class="form-group">
    {!! Form::label('link', __('models/ads.fields.link').':') !!}
    <span>{{ $ads->link }}</span>
</div>

