<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/newsletters.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.newsletters.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
