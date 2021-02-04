<div class="table-responsive-sm">
    <table class="table table-striped" id="jobs-table">
        <thead>
            <tr>
                <th>@lang('models/jobs.fields.service_id')</th>
                <th>@lang('models/jobs.fields.title')</th>
                <th>@lang('models/jobs.fields.visibility')</th>
                <th>@lang('models/jobs.fields.payment_type')</th>
                <th>@lang('models/jobs.fields.status')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
            <tr>
                <td>{{ $job->service->name ?? '' }}</td>
                <td>{{ $job->title }}</td>
                <td>{{ $job->visibility == 1 ? 'Any One' : 'Invite Only' }}</td>
                <td>{{ $job->payment_type == 1 ? 'Hourly' : 'Fixed' }}</td>
                <td>{{ $job->status }}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.jobs.destroy', $job->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('jobs view')
                        <a href="{{ route('adminPanel.jobs.show', [$job->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @endcan
                        @can('jobs edit')
                        <a href="{{ route('adminPanel.jobs.edit', [$job->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @endcan
                        @can('jobs destroy')
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
