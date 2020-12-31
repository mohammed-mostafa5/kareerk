<div class="row">
    <div class="col nav-tabs-boxed">

        <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
            @php $i = 1; @endphp
            @foreach ( config('langs') as $locale => $name)

            <li class="nav-item">
                <a class="nav-link {{request()->filled('languages')? request('languages') == $name ?'show active':'' : $i?'active':''}}" id="{{$name}}-tab" data-toggle="pill" href="#{{$name}}" role="tab" aria-controls="{{$name}}" aria-selected="{{request()->filled('languages')? request('languages') == $name ?'show active':'' : $i ? 'true' : 'false'}}">{{$name}}</a>
            </li>

            @php $i = 0; @endphp
            @endforeach
        </ul>

        <div class="tab-content" id="pills-tabContent">

            @php $i = 1; @endphp
            @foreach ( config('langs') as $locale => $name)

            <div class="tab-pane fade {{request()->filled('languages')? request('languages') == $name ?'show active':'' : $i?'show active':''}}" id="{{$name}}" role="tabpanel" aria-labelledby="{{$name}}-tab">
                <!-- Text Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('name', __('models/countries.fields.name').':') !!}
                    {!! Form::text($locale . '[name]', isset($country)? $country->translateOrNew($locale)->name : '' ,
                    ['class' =>'form-control', 'placeholder' => $name . ' name']) !!}
                </div>
            </div>

            @php $i = 0; @endphp
            @endforeach

            <!-- Status Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('status', __('models/countries.fields.status').':') !!}
                <label class="radio-inline">
                    {!! Form::radio('status', 1, 'active') !!} active
                </label>

                <label class="radio-inline">
                    {!! Form::radio('status', 0, null) !!} Inactive
                </label>

            </div>

            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('adminPanel.countries.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
            </div>

        </div>
    </div>
</div>
