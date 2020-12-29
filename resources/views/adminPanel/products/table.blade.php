<div class="table-responsive-sm">
    <table class="table table-striped" id="products-table">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('models/products.fields.category_name')</th>
                <th>@lang('models/products.fields.name')</th>
                <th>@lang('models/products.fields.description')</th>
                <th>@lang('models/products.fields.start_bid_price')</th>
                <th>@lang('models/products.fields.status')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)

            <tr>
                <td>{{$product->id}}</td>
                <td>{{ $product->category->name ?? ''}}</td>
                <td>{{ $product->name ?? ''}}</td>
                <td>{{ Str::limit($product->description ?? '',50) ?? ''}}</td>
                <td>{{ $product->start_bid_price ?? ''}}</td>
                <td>{{ $product->status ?? ''}}</td>


                <td>
                    <a href="{{ route('adminPanel.products.show', [$product->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                    <a href="{{ route('adminPanel.products.edit', [$product->id]) }}" class="btn btn-primary btn-sm {{$product->approved_at ? 'd-none': 'd-inline'}}" {{$product->approved_at ? 'disabled': ''}}>@lang('models/products.fields.approve')</a>
                    {{-- <form action="{{ route('adminPanel.products.edit', [$product->id]) }}" method="post" class="d-inline">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary btn-sm" {{$product->approved_at ? 'disabled': ''}}>Approve</button>
                    </form> --}}
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
