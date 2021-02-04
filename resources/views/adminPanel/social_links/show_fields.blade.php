<!-- Id Field -->
<div class="form-group show">
    {!! Form::label('id', __('models/socialLinks.fields.id').':') !!}
    <p>{{ $socialLink->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group show">
    {!! Form::label('name', __('models/socialLinks.fields.name').':') !!}
    <p>{{ $socialLink->name }}</p>
</div>

<!-- Link Field -->
<div class="form-group show">
    {!! Form::label('link', __('models/socialLinks.fields.link').':') !!}
    <p>{{ $socialLink->link }}</p>
</div>

<!-- Status Field -->
<div class="form-group show">
    {!! Form::label('status', __('models/socialLinks.fields.status').':') !!}
    <p>{{ $socialLink->status }}</p>
</div>
{{--
<!-- Status Field -->
<div class="form-group show">
    {!! Form::label('icon', 'Icon') !!}
    <p><i class="{{ $socialLink->icon}} fa-lg"></i></p>
</div> --}}
