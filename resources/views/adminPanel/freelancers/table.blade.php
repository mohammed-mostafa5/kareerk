<div class="table-responsive-sm">
    <table class="table table-striped" id="freelancers-table">
        <thead>
            <tr>
                <th>@lang('models/freelancers.fields.main_service_id')</th>
                <th>@lang('models/freelancers.fields.expertise_level')</th>
                <th>@lang('models/freelancers.fields.hourly_rate')</th>
                <th>@lang('models/freelancers.fields.title')</th>
                <th>@lang('models/freelancers.fields.overview')</th>
                <th>@lang('models/freelancers.fields.photo')</th>
                <th>@lang('models/freelancers.fields.city')</th>
                <th>@lang('models/freelancers.fields.address')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($freelancers as $freelancer)
            <tr>
                <td>{{ $freelancer->main_service_id }}</td>
                <td>{{ $freelancer->expertise_level }}</td>
                <td>{{ $freelancer->hourly_rate }}</td>
                <td>{{ $freelancer->title }}</td>
                <td>{{ $freelancer->overview }}</td>
                <td>{{ $freelancer->photo }}</td>
                <td>{{ $freelancer->city }}</td>
                <td>{{ $freelancer->address }}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.freelancers.destroy', $freelancer->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('freelancers view')
                        <a href="{{ route('adminPanel.freelancers.show', [$freelancer->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @endcan
                        {{-- <a href="{{ route('adminPanel.freelancers.edit', [$freelancer->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a> --}}
                        @can('freelancers destroy')
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
