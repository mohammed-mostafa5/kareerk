

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.clients.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
