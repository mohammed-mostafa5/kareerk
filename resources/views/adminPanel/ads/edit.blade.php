@extends('adminPanel.layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('adminPanel.ads.index') !!}">@lang('models/ads.singular')</a>
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
                              <strong>Edit @lang('models/ads.singular')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($ads, ['route' => ['adminPanel.ads.update', $ads->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                              @include('adminPanel.ads.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection