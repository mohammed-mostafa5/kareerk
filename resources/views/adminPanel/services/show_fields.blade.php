@if (isset($service->photo))
<!-- Photo Field -->
<div class="form-group">
    <label for="photo">Photo: </label>
    <img src="{{ $service->photo_path }}" alt="{{ $service->name }}" class="image-thumbnail" width="300">
</div>
@endif

@if (isset($service->cover))
<!-- cover Field -->
<div class="form-group">
    <label for="cover">Cover: </label>
    <img src="{{ $service->cover}}" alt="{{ $service->name }}" class="image-thumbnail" width="300">
</div>
@endif

<!-- Status Field -->
<div class="form-group show">
    {!! Form::label('status', __('models/services.fields.status').':') !!}
    <p>{{ $service->status }}</p>
</div>




@foreach ( config('langs') as $locale => $name)
<!-- name Field -->
<div class="form-group show">
    {!! Form::label('name', $name . ' ' . __('models/services.fields.name').':') !!}
    <span>{{ $service->translate($locale)->name }}</span>
</div>
<!-- Parent Id Field -->
<div class="form-group show">
    {!! Form::label('parent_id', $name . ' ' . __('models/services.fields.parent').':') !!}
    <p>{{ isset($service->parent_id) ? $service->mainService->translate($locale)->name : '' }}</p>
</div>
@endforeach
