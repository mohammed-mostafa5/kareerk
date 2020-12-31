<div class="table-responsive-sm">
    <table class="table table-striped" id="clients-table">
        <thead>
            <tr>

                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>

                <td>
                    {!! Form::open(['route' => ['adminPanel.clients.destroy', $client->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('adminPanel.clients.show', [$client->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('adminPanel.clients.edit', [$client->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>