<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/social_links.fields.id').':') !!}
    <p>{{ $socialLink->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/social_links.fields.name').':') !!}
    <p>{{ $socialLink->name }}</p>
</div>

<!-- Link Field -->
<div class="form-group">
    {!! Form::label('link', __('models/social_links.fields.link').':') !!}
    <p>{{ $socialLink->link }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/social_links.fields.status').':') !!}
    <p>{{ $socialLink->status }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('icon', 'Icon') !!}
    <p><i class="{{ $socialLink->icon}} fa-lg"></i></p>
</div>

