<!-- Name Field -->
<div class="form-group show">
    {!! Form::label('name', __('models/clients.fields.name').':') !!}
    <p>{{ $client->user->name }}</p>
</div>
<!-- Email Field -->
<div class="form-group show">
    {!! Form::label('email', __('models/clients.fields.email').':') !!}
    <p>{{ $client->user->email }}</p>
</div>
<!-- Created At Field -->
<div class="form-group show">
    {!! Form::label('created_at', __('models/clients.fields.created_at').':') !!}
    <p>{{ $client->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group show">
    {!! Form::label('updated_at', __('models/clients.fields.updated_at').':') !!}
    <p>{{ $client->updated_at }}</p>
</div>
