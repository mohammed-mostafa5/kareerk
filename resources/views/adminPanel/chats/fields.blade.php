<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/chats.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by', __('models/chats.fields.created_by').':') !!}
    {!! Form::text('created_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Latest Message Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latest_message', __('models/chats.fields.latest_message').':') !!}
    {!! Form::text('latest_message', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.chats.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
