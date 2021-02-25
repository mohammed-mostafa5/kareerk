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
            {!! Form::label('title', __('models/blogs.fields.title').':') !!}
            {!! Form::text($locale . '[title]', isset($blog)? $blog->translate($locale)->title : '' , ['class' =>
            'form-control', 'placeholder' => $name . ' title']) !!}
        </div>
        <!-- description Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('description', __('models/blogs.fields.description').':') !!}
            {!! Form::textarea($locale . '[description]', isset($blog)? $blog->translate($locale)->description : '' , ['class' =>
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

    <!-- Photo Field -->
    <div class="form-group col-sm-6">
        @if (isset($blog->photo))
        <img src="{{$blog->photo_path}}" alt="" width="200" class="image-thumbnail">

        <div class="clearfix"></div>
        <br>
        @endif

        {!! Form::label('photo', __('models/blogs.fields.photo').':') !!}
        {!! Form::file('photo',['class' => 'form-control']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('adminPanel.blogs.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
    </div>


</div>
