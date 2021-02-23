<!-- Service Id Field -->
<div class="form-group show">
    {!! Form::label('service_id', __('models/jobs.fields.service_id').':') !!}
    <p>{{ $job->service->name ?? '' }}</p>
</div>

<!-- title Field -->
<div class="form-group show">
    {!! Form::label('title', __('models/jobs.fields.title').':') !!}
    <p>{{ $job->title }}</p>
</div>

<!-- Description Field -->
<div class="form-group show">
    {!! Form::label('description', __('models/jobs.fields.description').':') !!}
    <p>{{ $job->description }}</p>
</div>

<!-- Expertise Level Field -->
<div class="form-group show">
    {!! Form::label('expertise_level', __('models/jobs.fields.expertise_level').':') !!}
    @switch($job->expertise_level)
    @case(1)
    Entry level
    @break
    @case(2)
    Intermediate
    @break
    @case(3)
    Expert
    @break
    @default

    @endswitch
</div>

<!-- Visibility Field -->
<div class="form-group show">
    {!! Form::label('visibility', __('models/jobs.fields.visibility').':') !!}
    <p>{{  $job->visibility == 1 ? 'Any One' : 'Invite Only'  }}</p>
</div>

<!-- Freelancers Count Field -->
<div class="form-group show">
    {!! Form::label('freelancers_count', __('models/jobs.fields.freelancers_count').':') !!}
    <p>{{ $job->freelancers_count }}</p>
</div>

<!-- Payment Type Field -->
<div class="form-group show">
    {!! Form::label('payment_type', __('models/jobs.fields.payment_type').':') !!}
    <p>{{ $job->payment_type == 1 ? 'Hourly' : 'Fixed' }}</p>
</div>

<!-- Budget Field -->
<div class="form-group show">
    {!! Form::label('budget', __('models/jobs.fields.budget').':') !!}
    <p>{{ $job->budget }}</p>
</div>

<!-- Expected Time Field -->
<div class="form-group show">
    {!! Form::label('expected_time', __('models/jobs.fields.expected_time').':') !!}
    <p>{{ $job->expected_time }}</p>
</div>

<!-- Step Field -->
<div class="form-group show">
    {!! Form::label('step', __('models/jobs.fields.step').':') !!}
    <p>{{ $job->step }}</p>
</div>

<!-- Status Field -->
<div class="form-group show">
    {!! Form::label('status', __('models/jobs.fields.status').':') !!}
    <p>{{ $job->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group show">
    {!! Form::label('created_at', __('models/jobs.fields.created_at').':') !!}
    <p>{{ $job->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group show">
    {!! Form::label('updated_at', __('models/jobs.fields.updated_at').':') !!}
    <p>{{ $job->updated_at }}</p>
</div>
