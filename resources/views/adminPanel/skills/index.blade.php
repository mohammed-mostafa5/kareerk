@extends('adminPanel.layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">@lang('models/skills.plural')</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        @lang('models/skills.plural')
                        @can('skills create')
                        <a class="pull-right" href="{{ route('adminPanel.skills.create') . '?languages=en' }}"><i class="fa fa-plus-square fa-lg"></i> Create</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        @include('adminPanel.skills.table')
                        <div class="pull-right mr-3">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
