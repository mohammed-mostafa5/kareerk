<div class="table-responsive-sm">
    <table class="table table-striped" id="messages-table">
        <thead>
            <tr>
                <th>@lang('models/messages.fields.chat_id')</th>
        <th>@lang('models/messages.fields.user_id')</th>
        <th>@lang('models/messages.fields.text')</th>
        <th>@lang('models/messages.fields.seen')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{ $message->chat_id }}</td>
            <td>{{ $message->user_id }}</td>
            <td>{{ $message->text }}</td>
            <td>{{ $message->seen }}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.messages.destroy', $message->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('adminPanel.messages.show', [$message->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('adminPanel.messages.edit', [$message->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>