@extends('adminPanel.layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">@lang('models/products.plural')</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        @lang('models/products.plural')
                    </div>
                    <div class="card-body">
                        @include('adminPanel.products.table')
                        <div class="pull-right mr-3">

                            {{-- @include('coreui-templates::common.paginate', ['records' => $products]) --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
