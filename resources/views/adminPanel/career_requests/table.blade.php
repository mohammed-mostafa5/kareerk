<div class="table-responsive-sm">
    <table class="table table-striped" id="careerRequests-table">
        <thead>
            <tr>
                <th>@lang('models/careerRequests.fields.career_id')</th>
                <th>@lang('models/careerRequests.fields.name')</th>
                <th>@lang('models/careerRequests.fields.email')</th>
                <th>@lang('models/careerRequests.fields.phone')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($careerRequests as $careerRequest)
            <tr>
                <td>{{ Str::limit($careerRequest->career->title, 50) ?? '' }}</td>
                <td>{{ $careerRequest->name }}</td>
                <td>{{ $careerRequest->email }}</td>
                <td>{{ $careerRequest->phone }}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.careerRequests.destroy', $careerRequest->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('careerRequests view')
                        <a href="{{ route('adminPanel.careerRequests.show', [$careerRequest->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @endcan
                        {{-- <a href="{{ route('adminPanel.careerRequests.edit', [$careerRequest->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a> --}}
                        @can('careerRequests destroy')
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
