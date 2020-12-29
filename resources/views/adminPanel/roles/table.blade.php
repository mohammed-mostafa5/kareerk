<div class="table-responsive-sm">
    <table class="table table-striped" id="roles-table">
        <thead>
            <th>@lang('models/roles.fields.name')</th>
            <th >@lang('crud.action')</th>
        </thead>
        <tbody>
        @foreach($roles as $roles)
            <tr>
                <td>{{ $roles->name }}</td>
                @if($roles->id != 1)
                <td>
                    {!! Form::open(['route' => ['adminPanel.roles.destroy', $roles->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('adminPanel.roles.show', [$roles->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @can('roles edit')
                        <a href="{{ route('adminPanel.roles.edit', [$roles->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @endcan
                        @can('roles destroy')
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
                @else
                    <td></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
