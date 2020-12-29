<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/newsletters.fields.id').':') !!}
    <p>{{ $newsletter->id }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/newsletters.fields.email').':') !!}
    <p>{{ $newsletter->email }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/newsletters.fields.created_at').':') !!}
    <p>{{ $newsletter->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/newsletters.fields.updated_at').':') !!}
    <p>{{ $newsletter->updated_at }}</p>
</div>

