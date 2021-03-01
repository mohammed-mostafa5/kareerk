@extends('adminPanel.layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{!! route('adminPanel.siteOptions.edit', 1) !!}">@lang('models/siteOptions.singular')</a>
    </li>
    <li class="breadcrumb-item active">@lang('crud.edit')</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit fa-lg"></i>
                        <strong>Edit @lang('models/siteOptions.singular')</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::model($siteOption, ['route' => ['adminPanel.siteOptions.update', $siteOption->id], 'method' => 'patch']) !!}

                        @include('adminPanel.site_options.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
