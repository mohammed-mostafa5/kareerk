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
        <!-- Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('title', __('models/sliders.fields.title').':') !!}
            {!! Form::text($locale . '[title]', isset($slider)? $slider->translate($locale)->title : '' , ['class' =>
            'form-control', 'placeholder' => $name . ' title']) !!}
        </div>

        <!-- Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('subtitle', __('models/sliders.fields.subtitle').':') !!}
            {!! Form::text($locale . '[subtitle]', isset($slider)? $slider->translate($locale)->subtitle : '' , ['class' =>
            'form-control', 'placeholder' => $name . ' subtitle']) !!}
        </div>

        <!-- Button text Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('name', __('models/sliders.fields.button_text').':') !!}
            {!! Form::text($locale . '[button_text]', isset($slider)? $slider->translate($locale)->button_text : '' ,
            ['class'
            => 'form-control', 'placeholder' => $name . ' Button Text']) !!}
        </div>


        <!-- content Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('content', __('models/sliders.fields.content').':') !!}

            {!! Form::textarea($locale . '[content]', isset($slider)? $slider->translate($locale)->content : ''
            , ['class' => 'form-control', 'placeholder' => $name . ' content']) !!}
        </div>

        {{--

        <script type="text/javascript">
            CKEDITOR.replace("{{ $locale . '[description]' }}", {
        filebrowserUploadUrl: "{{route('adminPanel.ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
        });
        </script> --}}

    </div>

    @php $i = 0; @endphp
    @endforeach

    <div class="form-group col-sm-6">
        @if (isset($slider))
        <img src="{{asset('uploads/images/thumbnail/'. $slider->photo)}}" class="" style="width: 200px" alt="">
        @endif
        {!! Form::label('photo', __('models/categories.fields.photo').':') !!}
        {!! Form::file('photo', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Link Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('link', __('models/sliders.fields.link').':') !!}
        {!! Form::text('link', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Sort Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('sort', __('models/sliders.fields.sort').':') !!}
        {!! Form::number('in_order_to', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Status Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('status', __('models/categories.fields.status').':') !!}

        <label class="radio-inline">
            {!! Form::radio('status', "1", 'active') !!} active
        </label>

        <label class="radio-inline">
            {!! Form::radio('status', "0", null) !!} inactive
        </label>

    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('adminPanel.categories.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
    </div>

</div>
