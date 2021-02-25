<!-- Id Field -->
<div class="form-group show">
    {!! Form::label('id', __('models/careerRequests.fields.id').':') !!}
    <p>{{ $careerRequest->id }}</p>
</div>

<!-- Career Id Field -->
<div class="form-group show">
    {!! Form::label('career_id', __('models/careerRequests.fields.career_id').':') !!}
    <p>{{ $careerRequest->career->title ?? '' }}</p>
</div>

<!-- Name Field -->
<div class="form-group show">
    {!! Form::label('name', __('models/careerRequests.fields.name').':') !!}
    <p>{{ $careerRequest->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group show">
    {!! Form::label('email', __('models/careerRequests.fields.email').':') !!}
    <p>{{ $careerRequest->email }}</p>
</div>

<!-- Phone Field -->
<div class="form-group show">
    {!! Form::label('phone', __('models/careerRequests.fields.phone').':') !!}
    <p>{{ $careerRequest->phone }}</p>
</div>

<!-- Cover Letter Field -->
<div class="form-group show">
    {!! Form::label('cover_letter', __('models/careerRequests.fields.cover_letter').':') !!}
    <p>{{ $careerRequest->cover_letter }}</p>
</div>

<!-- Created At Field -->
<div class="form-group show">
    {!! Form::label('created_at', __('models/careerRequests.fields.created_at').':') !!}
    <p>{{ $careerRequest->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group show">
    {!! Form::label('updated_at', __('models/careerRequests.fields.updated_at').':') !!}
    <p>{{ $careerRequest->updated_at }}</p>
</div>

<!-- Cv Field -->
<div class="form-group show">
    {!! Form::label('cv', __('models/careerRequests.fields.cv').':') !!}
    <embed src="{{ $careerRequest->cv }}" type="application/pdf" frameBorder="0" scrolling="auto" height="500" width="950">
</div>
