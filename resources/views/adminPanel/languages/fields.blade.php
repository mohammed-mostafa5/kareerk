<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/languages.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', __('models/languages.fields.status').':') !!}
    <label class="radio-inline">
        {!! Form::radio('status', 1, 'active') !!} active
    </label>

    <label class="radio-inline">
        {!! Form::radio('status', 0, null) !!} Inactive
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.languages.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
