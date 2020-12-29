@foreach ( config('langs') as $locale => $name)
<!-- Name Field -->
<div class="form-group show">
    {!! Form::label('name', $name . ' ' . __('models/categories.fields.name').':') !!}
    <span>{{ $faqCategory->translate($locale)->name }}</span>

</div>
@endforeach
