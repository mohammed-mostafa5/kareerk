<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/jobs.fields.id').':') !!}
    <p>{{ $job->id }}</p>
</div>

<!-- Service Id Field -->
<div class="form-group">
    {!! Form::label('service_id', __('models/jobs.fields.service_id').':') !!}
    <p>{{ $job->service_id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/jobs.fields.name').':') !!}
    <p>{{ $job->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/jobs.fields.description').':') !!}
    <p>{{ $job->description }}</p>
</div>

<!-- Expertise Level Field -->
<div class="form-group">
    {!! Form::label('expertise_level', __('models/jobs.fields.expertise_level').':') !!}
    <p>{{ $job->expertise_level }}</p>
</div>

<!-- Visibility Field -->
<div class="form-group">
    {!! Form::label('visibility', __('models/jobs.fields.visibility').':') !!}
    <p>{{ $job->visibility }}</p>
</div>

<!-- Freelancers Count Field -->
<div class="form-group">
    {!! Form::label('freelancers_count', __('models/jobs.fields.freelancers_count').':') !!}
    <p>{{ $job->freelancers_count }}</p>
</div>

<!-- Payment Type Field -->
<div class="form-group">
    {!! Form::label('payment_type', __('models/jobs.fields.payment_type').':') !!}
    <p>{{ $job->payment_type }}</p>
</div>

<!-- Budget Field -->
<div class="form-group">
    {!! Form::label('budget', __('models/jobs.fields.budget').':') !!}
    <p>{{ $job->budget }}</p>
</div>

<!-- Expected Time Field -->
<div class="form-group">
    {!! Form::label('expected_time', __('models/jobs.fields.expected_time').':') !!}
    <p>{{ $job->expected_time }}</p>
</div>

<!-- Step Field -->
<div class="form-group">
    {!! Form::label('step', __('models/jobs.fields.step').':') !!}
    <p>{{ $job->step }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/jobs.fields.status').':') !!}
    <p>{{ $job->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/jobs.fields.created_at').':') !!}
    <p>{{ $job->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/jobs.fields.updated_at').':') !!}
    <p>{{ $job->updated_at }}</p>
</div>

