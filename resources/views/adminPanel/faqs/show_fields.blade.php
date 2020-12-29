@foreach ( config('langs') as $locale => $name)
<!-- question Field -->
<div class="form-group show">
    {!! Form::label('question', $name . ' ' . __('models/faqs.fields.question').':') !!}
    <span>{{ $faq->translate($locale)->question }}</span>
</div>
<!-- answer Field -->
<div class="form-group show">
    {!! Form::label('answer', $name . ' ' . __('models/faqs.fields.answer').':') !!}
    <span>{{ $faq->translate($locale)->answer }}</span>
</div>
@endforeach
