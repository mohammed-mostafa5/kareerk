@extends('adminPanel.layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{!! route('adminPanel.featuredFreelancers.index') !!}">@lang('models/featuredFreelancers.singular')</a>
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
                        <strong>Edit @lang('models/featuredFreelancers.singular')</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::model($featuredFreelancer, ['route' => ['adminPanel.featuredFreelancers.update', $featuredFreelancer->id], 'method' => 'patch']) !!}

                        @include('adminPanel.featured_freelancers.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
