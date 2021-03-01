<div class="table-responsive-sm">
    <table class="table table-striped" id="transactions-table">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('models/transactions.fields.user')</th>
                <th>@lang('models/transactions.fields.value')</th>
                <th>@lang('models/transactions.fields.action')</th>
                <th>@lang('models/transactions.fields.created_at')</th>
                {{-- <th>@lang('crud.action')</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)

            <tr>
                <td>{{$transaction->id}}</td>
                <td>{{ $transaction->user->name ?? ''}} {{ $transaction->user->last_name ?? ''}}</td>
                <td class="text-{{$transaction->value > 0 ? 'success' : 'danger'}}">{{ $transaction->value ?? ''}}</td>
                <td>{{ $transaction->action ?? ''}}</td>
                <td>{{ $transaction->created_at ?? ''}}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
