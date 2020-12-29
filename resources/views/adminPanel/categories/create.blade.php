@extends('adminPanel.layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('adminPanel.categories.index') !!}">@lang('models/categories.singular')</a>
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
                                <strong>Create @lang('models/categories.singular')</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'adminPanel.categories.store', 'enctype' => 'multipart/form-data']) !!}

                                   @include('adminPanel.categories.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
