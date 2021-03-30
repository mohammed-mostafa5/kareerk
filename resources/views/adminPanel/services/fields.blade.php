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
            {!! Form::label('name', __('models/services.fields.name').':') !!}
            {!! Form::text($locale . '[name]', isset($service)? $service->translate($locale)->name : '' , ['class' =>
            'form-control', 'placeholder' => $name . ' name']) !!}
        </div>
        <!-- description Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('description', __('models/services.fields.description').':') !!}
            {!! Form::textarea($locale . '[description]', isset($service)? $service->translate($locale)->description : '' , ['class' =>
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

    <!-- Parent Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('parent_id', __('models/services.fields.parent').':') !!}
        {!! Form::select('parent_id', $parents , isset($service->parent_id) ?? null, ['class' => 'form-control', 'placeholder' => 'Select Main Service']) !!}
    </div>


    <!-- Photo Field -->
    <div class="form-group col-sm-6">
        @if (isset($service->photo))
        <img src="{{$service->photo_path}}" alt="" width="200" class="image-thumbnail">

        <div class="clearfix"></div>
        <br>
        @endif

        {!! Form::label('photo', __('models/services.fields.photo').':') !!}
        {!! Form::file('photo',['class' => 'form-control']) !!}
    </div>

    <!-- cover Field -->
    <div class="form-group col-sm-6">
        @if (isset($service->cover))
        <img src="{{$service->cover}}" alt="" width="200" class="image-thumbnail">
        <div class="clearfix"></div>
        <br>
        @endif

        {!! Form::label('cover', __('models/services.fields.cover').':') !!}
        {!! Form::file('cover',['class' => 'form-control']) !!}
    </div>

    <!-- icon Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('icon', 'Icon :') !!}
        {!! Form::text('icon', null,['class' => 'form-control']) !!}
    </div>

    <!-- Status Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('status', __('models/services.fields.status').':') !!}

        <label class="radio-inline">
            {!! Form::radio('status', "1", 'active') !!} active
        </label>

        <label class="radio-inline">
            {!! Form::radio('status', "0", null) !!} inactive
        </label>
    </div>

    <!-- in_home Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('in_home', __('models/services.fields.in_home').':') !!}

        <label class="radio-inline">
            {!! Form::radio('in_home', "1", 'yes') !!} Yes
        </label>

        <label class="radio-inline">
            {!! Form::radio('in_home', "0", null) !!} No
        </label>
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('adminPanel.services.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
    </div>

</div>
