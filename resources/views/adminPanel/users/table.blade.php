<div class="table-responsive-sm">
    <table class="table table-striped " id="users-table">
        <thead>
            <th>@lang('models/users.fields.name')</th>
            <th>@lang('models/users.fields.email')</th>
            <th>@lang('models/users.fields.status')</th>
            <th>@lang('models/users.fields.created_at')</th>
            <th>@lang('crud.action')</th>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->first_name }} {{$user->last_name}}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->status }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <div class='btn-group'>
                        @can('users view')
                        <a href="{{ route('adminPanel.users.show', [$user->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <form action="{{ route('adminPanel.user.approve', [$user->id]) }}" method="post">
                            @csrf
                            @method('patch')
                        <button type="submit" class="btn btn-primary btn-sm" {{$user->approved_at ? 'disabled': ''}}>Approve</button>
                        </form>
                        {{-- <a href="{{ route('adminPanel.user.approve', [$user->id]) }}" class='btn btn-ghost-success'>Approve</a> --}}
                        @endcan
                    </div>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
