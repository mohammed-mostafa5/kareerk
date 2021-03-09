<!-- Id Field -->
<div class="form-group show">
    {!! Form::label('id', __('models/careers.fields.id').':') !!}
    <p>{{ $career->id }}</p>
</div>

@foreach ( config('langs') as $locale => $name)
<!-- name Field -->
<div class="form-group show">
    {!! Form::label('title', $name . ' ' . __('models/careers.fields.title').':') !!}
    <span>{{ $career->translate($locale)->title }}</span>
</div>

<!-- name Field -->
<div class="form-group show">
    {!! Form::label('description', $name . ' ' . __('models/careers.fields.description').':') !!}
    <span>{!! $career->translate($locale)->description !!}</span>
</div>

<!-- name Field -->
<div class="form-group show">
    {!! Form::label('brief', $name . ' ' . __('models/careers.fields.brief').':') !!}
    <span>{!! $career->translate($locale)->brief !!}</span>
</div>

@endforeach
<!-- Created At Field -->
<div class="form-group show">
    {!! Form::label('created_at', __('models/careers.fields.created_at').':') !!}
    <p>{{ $career->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group show">
    {!! Form::label('updated_at', __('models/careers.fields.updated_at').':') !!}
    <p>{{ $career->updated_at }}</p>
</div>
