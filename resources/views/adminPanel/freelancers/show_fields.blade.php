<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/freelancers.fields.id').':') !!}
    <p>{{ $freelancer->id }}</p>
</div>

<!-- Main Service Id Field -->
<div class="form-group">
    {!! Form::label('main_service_id', __('models/freelancers.fields.main_service_id').':') !!}
    <p>{{ $freelancer->main_service_id }}</p>
</div>

<!-- Expertise Level Field -->
<div class="form-group">
    {!! Form::label('expertise_level', __('models/freelancers.fields.expertise_level').':') !!}
    <p>{{ $freelancer->expertise_level }}</p>
</div>

<!-- Hourly Rate Field -->
<div class="form-group">
    {!! Form::label('hourly_rate', __('models/freelancers.fields.hourly_rate').':') !!}
    <p>{{ $freelancer->hourly_rate }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('models/freelancers.fields.title').':') !!}
    <p>{{ $freelancer->title }}</p>
</div>

<!-- Overview Field -->
<div class="form-group">
    {!! Form::label('overview', __('models/freelancers.fields.overview').':') !!}
    <p>{{ $freelancer->overview }}</p>
</div>

<!-- Photo Field -->
<div class="form-group">
    {!! Form::label('photo', __('models/freelancers.fields.photo').':') !!}
    <p>{{ $freelancer->photo }}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', __('models/freelancers.fields.city').':') !!}
    <p>{{ $freelancer->city }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', __('models/freelancers.fields.address').':') !!}
    <p>{{ $freelancer->address }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/freelancers.fields.created_at').':') !!}
    <p>{{ $freelancer->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/freelancers.fields.updated_at').':') !!}
    <p>{{ $freelancer->updated_at }}</p>
</div>

