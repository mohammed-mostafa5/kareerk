<div class="table-responsive-sm">
    <table class="table table-striped" id="transactions-table">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('models/transactions.fields.user')</th>
                <th>@lang('models/transactions.fields.value')</th>
                <th>@lang('models/transactions.fields.action')</th>
                {{-- <th>@lang('crud.action')</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)

            <tr>
                <td>{{$transaction->id}}</td>
                <td>{{ $transaction->user->first_name ?? ''}} {{ $transaction->user->last_name ?? ''}}</td>
                <td>{{ $transaction->value ?? ''}}</td>
                <td>{{ $transaction->action ?? ''}}</td>


                {{-- <td>
                    <a href="{{ route('adminPanel.transactions.show', [$transaction->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                <form action="{{ route('adminPanel.transactions.addToHome', [$transaction->id]) }}" method="post" class="d-inline">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary btn-sm" {{$transaction->in_home ? 'disabled': ''}}>Add To Home</button>
                </form>
                <form action="{{ route('adminPanel.transactions.removeFromHome', [$transaction->id]) }}" method="post" class="d-inline">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-danger btn-sm" {{$transaction->in_home ? '': 'disabled'}}>Remove From Home</button>
                </form>
                </td> --}}
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
