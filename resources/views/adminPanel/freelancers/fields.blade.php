<!-- Main Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('main_service_id', __('models/freelancers.fields.main_service_id').':') !!}
    {!! Form::text('main_service_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Expertise Level Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expertise_level', __('models/freelancers.fields.expertise_level').':') !!}
    {!! Form::text('expertise_level', null, ['class' => 'form-control']) !!}
</div>

<!-- Hourly Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hourly_rate', __('models/freelancers.fields.hourly_rate').':') !!}
    {!! Form::number('hourly_rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/freelancers.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Overview Field -->
<div class="form-group col-sm-6">
    {!! Form::label('overview', __('models/freelancers.fields.overview').':') !!}
    {!! Form::text('overview', null, ['class' => 'form-control']) !!}
</div>

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', __('models/freelancers.fields.photo').':') !!}
    {!! Form::text('photo', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', __('models/freelancers.fields.city').':') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', __('models/freelancers.fields.address').':') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.freelancers.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
