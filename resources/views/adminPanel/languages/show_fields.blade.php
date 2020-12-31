<!-- Name Field -->
<div class="form-group show">
    {!! Form::label('name', __('models/languages.fields.name').':') !!}
    <p>{{ $language->name }}</p>
</div>

<!-- Status Field -->
<div class="form-group show">
    {!! Form::label('status', __('models/languages.fields.status').':') !!}
    <p>{{ $language->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group show">
    {!! Form::label('created_at', __('models/languages.fields.created_at').':') !!}
    <p>{{ $language->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group show">
    {!! Form::label('updated_at', __('models/languages.fields.updated_at').':') !!}
    <p>{{ $language->updated_at }}</p>
</div>
