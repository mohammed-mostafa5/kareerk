<div class="table-responsive-sm">
    <table class="table table-striped" id="milestones-table">
        <thead>
            <tr>
                <th>@lang('models/milestones.fields.duration')</th>
                <th>@lang('models/milestones.fields.amount')</th>
                <th>@lang('models/milestones.fields.status')</th>
                <th>@lang('models/milestones.fields.admin_status')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($milestones as $milestone)
            <tr>
                <td>{{ $milestone->duration}}
                    @switch($milestone->duration_type)
                    @case(1) Hours @break
                    @case(2) Days @break
                    @case(3) Months @break
                    @default
                    @endswitch
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
                    @default
                    @endswitch
                </td>
                <td>
                    @can('milestones view')
                    <a href="{{ route('adminPanel.milestones.show', [$milestone->id]) }}" class='btn btn-ghost-success d-inline'><i class="fa fa-eye"></i></a>
                    @endcan
                    @if ($milestone->admin_status == 1)
                    {!! Form::open(['route' => ['adminPanel.milestones.underReview', $milestone->id], 'method' => 'patch', 'class' => 'd-inline']) !!}
                    @can('milestones under_review')
                    {!! Form::button('Under review', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']) !!}
                    @endcan
                    {!! Form::close() !!}
                    @endif
                    @if ($milestone->admin_status == 2 && $milestone->status == 4)
                    {!! Form::open(['route' => ['adminPanel.milestones.done', $milestone->id], 'method' => 'patch', 'class' => 'd-inline']) !!}
                    @can('milestones done')
                    {!! Form::button('Done', ['type' => 'submit', 'class' => 'btn btn-success btn-sm']) !!}
                    @endcan
                    {!! Form::close() !!}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
