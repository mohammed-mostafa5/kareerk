<!-- Freelancer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('freelancer_id', __('models/featuredFreelancers.fields.freelancer_id').':') !!}
    {!! Form::text('freelancer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Start At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_at', __('models/featuredFreelancers.fields.start_at').':') !!}
    {!! Form::text('start_at', null, ['class' => 'form-control','id'=>'start_at']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#start_at').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- End At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_at', __('models/featuredFreelancers.fields.end_at').':') !!}
    {!! Form::text('end_at', null, ['class' => 'form-control','id'=>'end_at']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#end_at').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', __('models/featuredFreelancers.fields.value').':') !!}
    {!! Form::number('value', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.featuredFreelancers.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
