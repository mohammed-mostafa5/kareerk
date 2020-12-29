@extends('adminPanel.layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{!! route('adminPanel.products.index') !!}">@lang('models/products.singular')</a>
    </li>
    <li class="breadcrumb-item active">@lang('crud.edit')</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        @include('flash::message')
        @if(Session::has('error'))
        <div class="aler alert-danger p-3 m-2">
            {{Session::get('error')}} . <a href="{{route('adminPanel.products.balanceMail', $product->id)}}" class='btn btn-primary btn-sm'>Send him email</a> to recharge his balance
        </div>

        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit fa-lg"></i>
                        <strong>Edit @lang('models/products.singular')</strong>
                    </div>

                    <div class="card-body">

                        {{-- <div class="form-group col-sm-6">
                            @if (isset($product->gallery))
                            @foreach ($product->gallery as $item)
                            <div class="image w-25 float-left pr-1">
                                <form action="{{route('adminPanel.products.destroyImage',$item->id)}}" method="POST">
                        @method('delete')
                        @csrf
                        <img src="{{asset("uploads/images/original/$item->photo")}}" class="img-thumbnail w-100" alt="">
                        <button type="submit" class="btn btn-danger position-absolute btn-sm" onclick="return confirm('Are you Sure ?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="clearfix"></div>
                <br> --}}
                {!! Form::model($product, ['route' => ['adminPanel.products.update', $product->id], 'method'
                => 'patch', 'enctype' => 'multipart/form-data']) !!}

                @include('adminPanel.products.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('scripts')
<script>
    $( ".regular_price" ).keyup(function() {
        $( ".distributor_price" ).val($( this ).val());
    });
</script>
@endsection
