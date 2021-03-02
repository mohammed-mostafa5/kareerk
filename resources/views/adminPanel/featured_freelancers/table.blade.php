<div class="table-responsive-sm">
    <table class="table table-striped" id="featuredFreelancers-table">
        <thead>
            <tr>
                <th>@lang('models/featuredFreelancers.fields.freelancer_id')</th>
                <th>@lang('models/featuredFreelancers.fields.start_at')</th>
                <th>@lang('models/featuredFreelancers.fields.end_at')</th>
                <th>@lang('models/featuredFreelancers.fields.value')</th>
                {{-- <th colspan="3">@lang('crud.action')</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($featuredFreelancers as $featuredFreelancer)
            <tr>
                <td>{{ $featuredFreelancer->freelancer->user->name ?? '' }}</td>
                <td>{{ $featuredFreelancer->start_at }}</td>
                <td>{{ $featuredFreelancer->end_at }}</td>
                <td>{{ $featuredFreelancer->value }}</td>
                {{-- <td>
                    {!! Form::open(['route' => ['adminPanel.featuredFreelancers.destroy', $featuredFreelancer->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('adminPanel.featuredFreelancers.show', [$featuredFreelancer->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                <a href="{{ route('adminPanel.featuredFreelancers.edit', [$featuredFreelancer->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
</div>
{!! Form::close() !!}
</td> --}}
</tr>
@endforeach
</tbody>
</table>
</div>
