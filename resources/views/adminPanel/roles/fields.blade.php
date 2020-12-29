<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/roles.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-12">



    <table class="table table-striped" id="admins-table">
        <thead>
        <th>@lang('models/admins.fields.name')</th>
        <th></th>
        <th>Control</th>
        <th></th>
        <th></th>
            
        </thead>
        <tbody>
            
            @php $page = null @endphp

            @forelse ($permissions as $permission)
                @if ($page != $permission->page)
                <tr>
                    <td>
                        <strong>{{ $permission->page }}:</strong>
                    </td>
                @endif
                <td>
                    @php 
                        $checked = old('permissions['. $permission->name .']', isset($roles) ? $roles->hasPermissionTo($permission->name): false );
                    @endphp
        
                    <label>
                        <input type="checkbox" name="{{ 'permissions['. $permission->name .']' }}" value="{{ $permission->name }}" {{ $checked ? 'checked' : '' }}>
                        {{ $permission->action }}
                    </label>
                </td>
                @php $page = $permission->page @endphp
                {{$page != $permission->page ? '</tr>':''}}
                @empty
                <h3 class="text-danger">No Permission Found</h3>
                @endforelse
        </tbody>
    </table>
    
    
        
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.roles.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>