@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">@lang('models/chats.plural')</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        @lang('models/chats.plural')
                        <a class="pull-right" href="{{ route('adminPanel.chats.create') }}"><i class="fa fa-plus-square fa-lg"></i> Create</a>
                    </div>
                    <div class="card-body">
                        @include('adminPanel.chats.table')
                        <div class="pull-right mr-3">

                            @include('coreui-templates::common.paginate', ['records' => $chats])

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
