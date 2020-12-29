<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/metas.fields.id').':') !!}
    <p>{{ $meta->id }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('models/metas.fields.title').':') !!}
    <p>{{ $meta->title }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/metas.fields.description').':') !!}
    <p>{{ $meta->description }}</p>
</div>

<!-- Keywords Field -->
<div class="form-group">
    {!! Form::label('keywords', __('models/metas.fields.keywords').':') !!}
    <p>{{ $meta->keywords }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/metas.fields.status').':') !!}
    <p>{{ $meta->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/metas.fields.created_at').':') !!}
    <p>{{ $meta->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/metas.fields.updated_at').':') !!}
    <p>{{ $meta->updated_at }}</p>
</div>

