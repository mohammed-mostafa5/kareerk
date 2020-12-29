@extends('adminPanel.layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('models/ads.plural')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             @lang('models/ads.plural')
                           
                         </div>
                         <div class="card-body">
                             @include('adminPanel.ads.table')
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

