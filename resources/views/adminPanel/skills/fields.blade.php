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
            {!! Form::label('name', __('models/skills.fields.name').':') !!}
            {!! Form::text($locale . '[name]', isset($skill)? $skill->translate($locale)->name : '' , ['class' =>
            'form-control', 'placeholder' => $name . ' name']) !!}
        </div>
    </div>
    @endforeach

    <!-- Service Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('service_id', __('models/skills.fields.service').':') !!}
        {!! Form::select('service_id', $services, isset($skill->service_id) ?? null, ['class' => 'form-control']) !!}
    </div>


    <!-- Status Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('status', __('models/skills.fields.status').':') !!}

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
        <a href="{{ route('adminPanel.skills.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
    </div>

</div>
