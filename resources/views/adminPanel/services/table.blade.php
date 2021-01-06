<div class="table-responsive-sm">
    <table class="table table-striped" id="services-table">
        <thead>
            <tr>
                <th>@lang('models/services.fields.id')</th>
                <th>@lang('models/services.fields.name')</th>
                <th>@lang('models/services.fields.status')</th>
                <th>@lang('models/services.fields.type')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->status }}</td>
                <td>{{ $service->parent_id ? 'Child': 'Parent' }}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.services.destroy', $service->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('services view')
                        <a href="{{ route('adminPanel.services.show', [$service->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @endcan
                        @can('services edit')
                        <a href="{{ route('adminPanel.services.edit', [$service->id]) . "?languages=en" }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @endcan
                        @can('services destroy')
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
