<div class="table-responsive-sm">
    <table class="table table-striped" id="freelancers-table">
        <thead>
            <tr>
                <th>@lang('models/freelancers.fields.name')</th>
                <th>@lang('models/freelancers.fields.email')</th>
                <th>@lang('models/freelancers.fields.phone')</th>
                <th>@lang('models/freelancers.fields.main_service_id')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($freelancers as $freelancer)
            <tr>
                <td>{{ $freelancer->user->name ?? '' }}</td>
                <td>{{ $freelancer->user->email ?? '' }}</td>
                <td>{{ $freelancer->user->phone ?? '' }}</td>
                <td>{{ $freelancer->mainService->name ?? '' }}</td>

                <td>
                    {!! Form::open(['route' => ['adminPanel.freelancers.destroy', $freelancer->id], 'method' => 'delete', 'class' => 'd-inline']) !!}
                    <div class='btn-group'>
                        @can('freelancers view')
                        <a href="{{ route('adminPanel.freelancers.show', [$freelancer->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @endcan
                        {{-- <a href="{{ route('adminPanel.freelancers.edit', [$freelancer->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a> --}}
                        {{-- @can('freelancers destroy')
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                        @endcan --}}


                    </div>
                    {!! Form::close() !!}
                    <form action="{{ route('adminPanel.freelancers.approve', [$freelancer->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('patch')
                        @can('freelancers approve')
                        <button type="submit" class="btn btn-primary btn-sm" {{$freelancer->status == 3 ? 'disabled': ''}}>{{$freelancer->status == 3 ? 'Approved': 'Approve'}}</button>
                        @endcan
                    </form>
                    <form action="{{ route('adminPanel.users.deactivate', [$freelancer->user->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('patch')
                        @can('users deactivate')
                        <button type="submit" class="btn btn-danger btn-sm" {{$freelancer->user->status == 'Inactive' ? 'disabled': ''}}>{{$freelancer->user->status == 'Inactive' ? 'Deactivated': 'Deactivate'}}</button>
                        @endcan
                    </form>
                    <form action="{{ route('adminPanel.users.activate', [$freelancer->user->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('patch')
                        @can('users activate')
                        <button type="submit" class="btn btn-success btn-sm" {{$freelancer->user->status == 'Active' ? 'disabled': ''}}>{{$freelancer->user->status == 'Active' ? 'Activated': 'Activate'}}</button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
