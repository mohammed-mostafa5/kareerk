<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/chatContacts.fields.id').':') !!}
    <p>{{ $chatContact->id }}</p>
</div>

<!-- Chat Id Field -->
<div class="form-group">
    {!! Form::label('chat_id', __('models/chatContacts.fields.chat_id').':') !!}
    <p>{{ $chatContact->chat_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/chatContacts.fields.user_id').':') !!}
    <p>{{ $chatContact->user_id }}</p>
</div>

<!-- Other User Id Field -->
<div class="form-group">
    {!! Form::label('other_user_id', __('models/chatContacts.fields.other_user_id').':') !!}
    <p>{{ $chatContact->other_user_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/chatContacts.fields.created_at').':') !!}
    <p>{{ $chatContact->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/chatContacts.fields.updated_at').':') !!}
    <p>{{ $chatContact->updated_at }}</p>
</div>

