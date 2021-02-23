<div class="table-responsive-sm">
    <table class="table table-striped" id="milestones-table">
        <thead>
            <tr>
                <th>@lang('models/milestones.fields.service_id')</th>
                <th>@lang('models/milestones.fields.duration')</th>
                <th>@lang('models/milestones.fields.visibility')</th>
                <th>@lang('models/milestones.fields.payment_type')</th>
                <th>@lang('models/milestones.fields.status')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($milestones as $milestone)
            <tr>
                <td>{{ $milestone->service->name ?? '' }}</td>
                <td>{{ $milestone->duration }}
                    @switch($milestone->duration_type)
                    @case(1)

                    @break
                    @case(2)

                    @break
                    @default

                    @endswitch
                </td>
                <td>{{ $milestone->visibility == 1 ? 'Any One' : 'Invite Only' }}</td>
                <td>{{ $milestone->payment_type == 1 ? 'Hourly' : 'Fixed' }}</td>
                <td>{{ $milestone->status }}</td>
                <td>
                    {{-- {!! Form::open(['route' => ['adminPanel.milestones.destroy', $milestone->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('milestones view')
                        <a href="{{ route('adminPanel.milestones.show', [$milestone->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    @endcan
                    @can('milestones edit')
                    <a href="{{ route('adminPanel.milestones.edit', [$milestone->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('milestones destroy')
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    @endcan
</div>
{!! Form::close() !!} --}}
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
