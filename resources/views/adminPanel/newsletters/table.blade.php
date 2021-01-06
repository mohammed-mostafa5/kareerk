<div class="table-responsive-sm">
    <table class="table table-striped" id="newsletters-table">
        <thead>
            <tr>
                <th>@lang('models/newsletters.fields.email')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($newsletters as $newsletter)
            <tr>
                <td>{{ $newsletter->email }}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.newsletters.destroy', $newsletter->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{-- <a href="{{ route('adminPanel.newsletters.show', [$newsletter->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a> --}}
                        {{-- <a href="{{ route('adminPanel.newsletters.edit', [$newsletter->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a> --}}
                        @can('newsletters destroy')
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
