<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/clients.fields.id').':') !!}
    <p>{{ $client->id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/clients.fields.created_at').':') !!}
    <p>{{ $client->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/clients.fields.updated_at').':') !!}
    <p>{{ $client->updated_at }}</p>
</div>

