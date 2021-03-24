<!-- Job Fees Field -->
<div class="form-group col-sm-6">
    {!! Form::label('job_fees', __('models/siteOptions.fields.job_fees').' ( $ ) :') !!}
    {!! Form::number('job_fees', null, ['class' => 'form-control']) !!}
</div>

<!-- Featured Fees Field -->
<div class="form-group col-sm-6">
    {!! Form::label('featured_fees', __('models/siteOptions.fields.featured_fees').' ( $ ) :') !!}
    {!! Form::number('featured_fees', null, ['class' => 'form-control']) !!}
</div>

<!-- Milestone Percentage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('milestone_percentage', __('models/siteOptions.fields.milestone_percentage').' ( % ) :') !!}
    {!! Form::number('milestone_percentage', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    {{-- <a href="{{ route('adminPanel.siteOptions.index') }}" class="btn btn-default">@lang('crud.cancel')</a> --}}
</div>
