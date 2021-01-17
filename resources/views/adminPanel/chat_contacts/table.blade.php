<div class="table-responsive-sm">
    <table class="table table-striped" id="chatContacts-table">
        <thead>
            <tr>
                <th>@lang('models/chatContacts.fields.chat_id')</th>
        <th>@lang('models/chatContacts.fields.user_id')</th>
        <th>@lang('models/chatContacts.fields.other_user_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($chatContacts as $chatContact)
            <tr>
                <td>{{ $chatContact->chat_id }}</td>
            <td>{{ $chatContact->user_id }}</td>
            <td>{{ $chatContact->other_user_id }}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.chatContacts.destroy', $chatContact->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('adminPanel.chatContacts.show', [$chatContact->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('adminPanel.chatContacts.edit', [$chatContact->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>