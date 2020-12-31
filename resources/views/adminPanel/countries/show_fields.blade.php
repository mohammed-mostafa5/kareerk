<!-- Status Field -->
<div class="form-group show">
    {!! Form::label('status', __('models/countries.fields.status').':') !!}
    <p>{{ $country->status }}</p>
</div>

<!-- name Field -->
<div class="form-group show show col-sm-12">
    {!! Form::label('name',__('models/countries.fields.name').':') !!}
    <p>{{ $country->name }}</p>
</div>
