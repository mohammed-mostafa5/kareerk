<!-- Career Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('career_id', __('models/careerRequests.fields.career_id').':') !!}
    {!! Form::text('career_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/careerRequests.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/careerRequests.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', __('models/careerRequests.fields.phone').':') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Cover Letter Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cover_letter', __('models/careerRequests.fields.cover_letter').':') !!}
    {!! Form::text('cover_letter', null, ['class' => 'form-control']) !!}
</div>

<!-- Cv Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cv', __('models/careerRequests.fields.cv').':') !!}
    {!! Form::file('cv') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.careerRequests.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
