@if (isset($images))
    <img src="{{asset('uploads/images/original/'. $images->photo)}}" alt="{{$images->page->name}}">
@endif

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', __('models/images.fields.photo').':') !!}
    {!! Form::file('photo') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.pages.images.index',isset($images) ? $images->page_id : $page->id) }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
