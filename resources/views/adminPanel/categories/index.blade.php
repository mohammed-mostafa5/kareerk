@extends('adminPanel.layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">@lang('models/categories.plural')</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        @lang('models/categories.plural')
                        @can('categories create')
                        <a class="pull-right" href="{{ route('adminPanel.categories.create') . "?languages=en"}}"><i class="fa fa-plus-square fa-lg"></i></a>
                        @endcan
                    </div>
                    <div class="card-body">
                        @include('adminPanel.categories.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
