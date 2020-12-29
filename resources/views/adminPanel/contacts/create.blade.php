@extends('adminPanel.layouts.app')

@section('title', __('models/contacts.plural') . ' ' . $settings->where('key', 'title_prefix')->first()->value)

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{!! route('adminPanel.contacts.index') !!}">@lang('models/contacts.singular')</a>
    </li>
    <li class="breadcrumb-item active">@lang('crud.add_new')</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>Create @lang('models/contacts.singular')</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'adminPanel.contacts.store']) !!}

                        @include('adminPanel.contacts.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection