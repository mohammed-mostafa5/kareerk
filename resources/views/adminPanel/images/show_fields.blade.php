<!-- Page Id Field -->
<div class="form-group show">
    {!! Form::label('page_id', __('models/images.fields.page_id').':') !!}
    <p>{{ $images->page->name }}</p>
</div>

<!-- Photo Field -->
<div class="form-group show">
    {!! Form::label('photo', __('models/images.fields.photo').':') !!}
    <img src="{{asset('uploads/images/original/'. $images->photo)}}" alt="{{$images->page->name}}">
</div>

