<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', __('models/ads.fields.photo').':') !!}
    {!! Form::file('photo', null, ['class' => 'form-control']) !!}
    <p><b>Width : </b>{{$ads->width}} <b>Height : </b>{{$ads->height}}</p>
</div>

<!-- Page Field -->
<div class="form-group col-sm-6">
    {!! Form::label('page', __('models/ads.fields.page').':') !!}
    {!! Form::text('page', null, ['class' => 'form-control','readonly'=>'readonly']) !!}
</div>

<!-- Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link', __('models/ads.fields.link').':') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.ads.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
