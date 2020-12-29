<div class="table-responsive-sm">
    <table class="table table-striped" id="reviews-table">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('models/reviews.fields.user')</th>
                <th>@lang('models/reviews.fields.product')</th>
                <th>@lang('models/reviews.fields.comment')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)

            <tr>
                <td>{{$review->id}}</td>
                <td>{{ $review->user->first_name ?? ''}} {{ $review->user->last_name ?? ''}}</td>
                <td>{{ $review->product->name ?? ''}}</td>
                <td>{{ Str::limit($review->comment ?? '',50) ?? ''}}</td>


                <td>
                    <a href="{{ route('adminPanel.reviews.show', [$review->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                    <form action="{{ route('adminPanel.reviews.addToHome', [$review->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-primary btn-sm" {{$review->in_home ? 'disabled': ''}}>Add To Home</button>
                    </form>
                    <form action="{{ route('adminPanel.reviews.removeFromHome', [$review->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-danger btn-sm" {{$review->in_home ? '': 'disabled'}}>Remove From Home</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
