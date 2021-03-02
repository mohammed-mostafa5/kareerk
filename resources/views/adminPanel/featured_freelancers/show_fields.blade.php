<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/featuredFreelancers.fields.id').':') !!}
    <p>{{ $featuredFreelancer->id }}</p>
</div>

<!-- Freelancer Id Field -->
<div class="form-group">
    {!! Form::label('freelancer_id', __('models/featuredFreelancers.fields.freelancer_id').':') !!}
    <p>{{ $featuredFreelancer->freelancer_id }}</p>
</div>

<!-- Start At Field -->
<div class="form-group">
    {!! Form::label('start_at', __('models/featuredFreelancers.fields.start_at').':') !!}
    <p>{{ $featuredFreelancer->start_at }}</p>
</div>

<!-- End At Field -->
<div class="form-group">
    {!! Form::label('end_at', __('models/featuredFreelancers.fields.end_at').':') !!}
    <p>{{ $featuredFreelancer->end_at }}</p>
</div>

<!-- Value Field -->
<div class="form-group">
    {!! Form::label('value', __('models/featuredFreelancers.fields.value').':') !!}
    <p>{{ $featuredFreelancer->value }}</p>
</div>

