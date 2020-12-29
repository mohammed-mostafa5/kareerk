<ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
    @php $i = 1; @endphp
    @foreach ( config('langs') as $locale => $name)

    <li class="nav-item">
        <a class="nav-link {{$i?'active':''}}" id="{{$name}}-tab" data-toggle="pill" href="#{{$name}}" role="tab" aria-controls="{{$name}}" aria-selected="{{ $i ? 'true' : 'false'}}">{{$name}}</a>
    </li>

    @php $i = 0; @endphp
    @endforeach
</ul>
<div class="tab-content" id="pills-tabContent">
    @php $i = 1; @endphp
    @foreach ( config('langs') as $locale => $name)

    <div class="tab-pane fade {{$i?'show active':''}}" id="{{$name}}" role="tabpanel" aria-labelledby="{{$name}}-tab">
        <!-- question Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('question', __('models/faqs.fields.question').':') !!}
            {!! Form::text($locale . '[question]', isset($faq)? $faq->translate($locale)->question : '' , ['class' =>
            'form-control', 'placeholder' => $name . ' question']) !!}
        </div>
        <!-- answer Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('answer', __('models/faqs.fields.answer').':') !!}
            {!! Form::text($locale . '[answer]', isset($faq)? $faq->translate($locale)->answer : '' , ['class' =>
            'form-control', 'placeholder' => $name . ' answer']) !!}
        </div>
    </div>

    @php $i = 0; @endphp
    @endforeach

    <!-- category Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('category', __('models/faqs.fields.category').':') !!}

        {!! Form::select('faq_category_id', $faqCategories, null, ['class' =>'form-control', 'placeholder' => 'Select Category']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('adminPanel.faqs.index') }}" class="btn btn-secondary">Cancel</a>
    </div>


</div>
