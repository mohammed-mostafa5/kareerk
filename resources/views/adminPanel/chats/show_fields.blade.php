<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/chats.fields.id').':') !!}
    <p>{{ $chat->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/chats.fields.name').':') !!}
    <p>{{ $chat->name }}</p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', __('models/chats.fields.created_by').':') !!}
    <p>{{ $chat->created_by }}</p>
</div>

<!-- Latest Message Field -->
<div class="form-group">
    {!! Form::label('latest_message', __('models/chats.fields.latest_message').':') !!}
    <p>{{ $chat->latest_message }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/chats.fields.created_at').':') !!}
    <p>{{ $chat->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/chats.fields.updated_at').':') !!}
    <p>{{ $chat->updated_at }}</p>
</div>

