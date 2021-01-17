<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/messages.fields.id').':') !!}
    <p>{{ $message->id }}</p>
</div>

<!-- Chat Id Field -->
<div class="form-group">
    {!! Form::label('chat_id', __('models/messages.fields.chat_id').':') !!}
    <p>{{ $message->chat_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/messages.fields.user_id').':') !!}
    <p>{{ $message->user_id }}</p>
</div>

<!-- Text Field -->
<div class="form-group">
    {!! Form::label('text', __('models/messages.fields.text').':') !!}
    <p>{{ $message->text }}</p>
</div>

<!-- Seen Field -->
<div class="form-group">
    {!! Form::label('seen', __('models/messages.fields.seen').':') !!}
    <p>{{ $message->seen }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/messages.fields.created_at').':') !!}
    <p>{{ $message->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/messages.fields.updated_at').':') !!}
    <p>{{ $message->updated_at }}</p>
</div>

