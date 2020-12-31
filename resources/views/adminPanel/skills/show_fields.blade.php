<!-- Status Field -->
<div class="form-group show">
    {!! Form::label('status', __('models/skills.fields.status').':') !!}
    <p>{{ $skill->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group show">
    {!! Form::label('created_at', __('models/skills.fields.created_at').':') !!}
    <p>{{ $skill->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group show">
    {!! Form::label('updated_at', __('models/skills.fields.updated_at').':') !!}
    <p>{{ $skill->updated_at }}</p>
</div>

<!-- name Field -->
<div class="form-group show">
    {!! Form::label('name', __('models/skills.fields.name').':') !!}
    <span>{{ $skill->name }}</span>
</div>
<!-- Parent Id Field -->
<div class="form-group show">
    {!! Form::label('parent_id', __('models/skills.fields.service').':') !!}
    <p>{{ isset($skill->service_id) ? $skill->service->name : '' }}</p>
</div>
