<div class="table-responsive-sm">
    <table class="table table-striped" id="milestones-table">
        <thead>
            <tr>
                <th>@lang('models/milestones.fields.id')</th>
                <th>@lang('models/milestones.fields.title')</th>
                <th>@lang('models/milestones.fields.job')</th>
                <th>@lang('models/milestones.fields.freelancer')</th>
                <th>@lang('models/milestones.fields.client')</th>
                <th>@lang('models/milestones.fields.amount')</th>
                <th>@lang('models/milestones.fields.status')</th>
                <th>@lang('models/milestones.fields.admin_status')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($milestones as $milestone)
            <tr>
                <td>{{ $milestone->id }}</td>
                <td>{{ $milestone->title }}</td>
                <td>
                    @if ($milestone->proposal)
                    <a href="{{route('adminPanel.jobs.show',  $milestone->proposal->job->id)}}">
                        {{ Str::limit($milestone->proposal->job->title, 50) ?? ''}}
                    </a>
                    @endif
                </td>
                <td>
                    @if ($milestone->proposal)
                    <a href="{{route('adminPanel.freelancers.show',  $milestone->proposal->freelancer->user->id)}}">
                        {{ $milestone->proposal->freelancer->user->name ?? ''}}
                    </a>
                    @endif
                </td>
                <td>
                    @if ($milestone->proposal)
                    <a href="{{route('adminPanel.clients.show',  $milestone->proposal->job->client->user->id)}}">
                        {{ $milestone->proposal->job->client->user->name ?? ''}}
                    </a>
                    @endif
                </td>
                <td>{{ $milestone->amount }}</td>
                <td>
                    @switch($milestone->status)
                    @case(1) New @break
                    @case(2) Finished @break
                    @case(3) Done @break
                    @case(4) Refused/Problem @break
                    @default
                    @endswitch
                </td>
                <td>
                    @switch($milestone->admin_status)
                    @case(1) New @break
                    @case(2) Under review @break
                    @case(3) Solved @break
                    @case(4) Not Solved @break
                    @case(5) Payment Done @break
                    @case(6) Client Refunded @break

                    @default
                    @endswitch
                </td>
                <td>
                    @can('milestones view')
                    <a href="{{ route('adminPanel.milestones.show', [$milestone->id]) }}" class='btn btn-ghost-success d-inline'><i class="fa fa-eye"></i></a>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@section('scripts')
<script>
    $(document).ready(function() {

    table.destroy();

    table = $('#milestones-table').DataTable( {
            "order": [[ 0, "desc" ]]
        } );
} );
</script>

@endsection
