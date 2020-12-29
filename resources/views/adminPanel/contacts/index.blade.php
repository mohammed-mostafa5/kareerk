@extends('adminPanel.layouts.app')

@section('title', __('models/contacts.plural') . ' ' . $settings->where('key', 'title_prefix')->first()->value)

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">@lang('models/contacts.plural')</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        @lang('models/contacts.plural')
                        {{-- <a class="pull-right" href="{{ route('adminPanel.contacts.create') }}"><i
                                class="fa fa-plus-square fa-lg"></i></a> --}}
                    </div>
                    <div class="card-body">
                        @include('adminPanel.contacts.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection