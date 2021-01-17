<!-- Chat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chat_id', __('models/messages.fields.chat_id').':') !!}
    {!! Form::text('chat_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/messages.fields.user_id').':') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('text', __('models/messages.fields.text').':') !!}
    {!! Form::text('text', null, ['class' => 'form-control']) !!}
</div>

<!-- Seen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seen', __('models/messages.fields.seen').':') !!}
    {!! Form::text('seen', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.messages.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
