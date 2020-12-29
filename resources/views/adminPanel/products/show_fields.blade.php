<div class="photos row">
    <!-- Photo Field -->
    <div class="form-group">
        {!! Form::label('photos', 'Photos : ') !!}
        <div class="product_photos p-3">
            @foreach ($product->gallery as $item)
            <img src="{{$item->photo}}" alt="{{$product->name}}" width="300" height="300" class="img-thumbnail">
            @endforeach
        </div>
    </div>
</div>
<!-- Category Field -->
<div class="form-group show">
    {!! Form::label('category', __('models/products.fields.category_name').':') !!}
    <span>{{ $product->category->name ?? ''}}</span>
</div>


<!-- Name Field -->
<div class="form-group show">
    {!! Form::label('name', __('models/products.fields.name').':') !!}
    <span>{{ $product->name }}</span>
</div>

<!-- Description Field -->
<div class="form-group show">
    {!! Form::label('description', __('models/products.fields.description').':') !!}
    <span>{{ $product->description }}</span>
</div>


<!-- start_bid_price Field -->
<div class="form-group show">
    {!! Form::label('start_bid_price', __('models/products.fields.start_bid_price').':') !!}
    <span>{{ $product->start_bid_price ?? '' }}</span>
</div>


<!-- start_bid_price Field -->
<div class="form-group show">
    {!! Form::label('min_bid_price', __('models/products.fields.min_bid_price').':') !!}
    <span>{{ $product->min_bid_price ?? '' }}</span>
</div>


<!-- Created At Field -->
<div class="form-group show">
    {!! Form::label('created_at', __('models/products.fields.created_at').':') !!}
    <span>{{ $product->created_at }}</span>
</div>

<!-- Updated At Field -->
<div class="form-group show">
    {!! Form::label('updated_at', __('models/products.fields.updated_at').':') !!}
    <span>{{ $product->updated_at }}</span>
</div>



{{-- <table class="table table-hover table-bordered w-50 float-left table-sm text-capitalize text-center">
    <thead>
        <tr>
            <th scope="col" class="bg-primary">{!! Form::label('name', __('models/pharmacies.fields.name').':') !!}</th>
            <th scope="col" class="bg-primary">{!! Form::label('price', __('lang.price').':') !!}</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($product->distributors as $distributor)
        <tr>
            <td>{{$distributor->name}}</td>
<td>{{$distributor->pivot->price}}</td>
</tr>
@empty

@endforelse
</tbody>
</table> --}}
<div class=" clearfix"></div>
