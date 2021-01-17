<!-- Chat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chat_id', __('models/chatContacts.fields.chat_id').':') !!}
    {!! Form::text('chat_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/chatContacts.fields.user_id').':') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Other User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('other_user_id', __('models/chatContacts.fields.other_user_id').':') !!}
    {!! Form::text('other_user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.chatContacts.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
