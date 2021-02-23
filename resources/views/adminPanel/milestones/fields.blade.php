<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_id', __('models/jobs.fields.service_id').':') !!}
    {!! Form::text('service_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/jobs.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/jobs.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Expertise Level Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expertise_level', __('models/jobs.fields.expertise_level').':') !!}
    {!! Form::text('expertise_level', null, ['class' => 'form-control']) !!}
</div>

<!-- Visibility Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visibility', __('models/jobs.fields.visibility').':') !!}
    {!! Form::text('visibility', null, ['class' => 'form-control']) !!}
</div>

<!-- Freelancers Count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('freelancers_count', __('models/jobs.fields.freelancers_count').':') !!}
    {!! Form::number('freelancers_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_type', __('models/jobs.fields.payment_type').':') !!}
    {!! Form::text('payment_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Budget Field -->
<div class="form-group col-sm-6">
    {!! Form::label('budget', __('models/jobs.fields.budget').':') !!}
    {!! Form::text('budget', null, ['class' => 'form-control']) !!}
</div>

<!-- Expected Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expected_time', __('models/jobs.fields.expected_time').':') !!}
    {!! Form::text('expected_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Step Field -->
<div class="form-group col-sm-6">
    {!! Form::label('step', __('models/jobs.fields.step').':') !!}
    {!! Form::text('step', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', __('models/jobs.fields.status').':') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.jobs.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
