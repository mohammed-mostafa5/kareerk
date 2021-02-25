<ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">

    @foreach ( config('langs') as $locale => $name)

    <li class="nav-item">
        <a class="nav-link {{request('languages') == $locale ?'active':''}}" id="{{$name}}-tab" data-toggle="pill" href="#{{$name}}" role="tab" aria-controls="{{$name}}" aria-selected="{{ request('languages') == $locale  ? 'true' : 'false'}}">{{$name}}</a>
    </li>

    @endforeach
</ul>
<div class="tab-content" id="pills-tabContent">
    @foreach ( config('langs') as $locale => $name)
    <div class="tab-pane fade {{request('languages') == $locale?'show active':''}}" id="{{$name}}" role="tabpanel" aria-labelledby="{{$name}}-tab">
        <!-- Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('title', __('models/careers.fields.title').':') !!}
            {!! Form::text($locale . '[title]', isset($career)? $career->translate($locale)->title : '' , ['class' =>
            'form-control', 'placeholder' => $name . ' title']) !!}
        </div>
        <!-- description Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('description', __('models/careers.fields.description').':') !!}
            {!! Form::textarea($locale . '[description]', isset($career)? $career->translate($locale)->description : '' , ['class' =>
            'form-control', 'placeholder' => $name . ' description']) !!}
        </div>
        <script type="text/javascript">
            CKEDITOR.replace("{{ $locale . '[description]' }}", {
                filebrowserUploadUrl: "{{route('adminPanel.ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
        </script>
    </div>
    @endforeach

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('adminPanel.careers.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
    </div>


</div>
