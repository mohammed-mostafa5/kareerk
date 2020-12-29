@extends('adminPanel.layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('adminPanel.pages.index') !!}">{{$page->name}}</a>
        </li>
        <li class="breadcrumb-item">@lang('models/images.plural')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             @lang('models/images.plural')
                             <a class="pull-right" href="{{ route('adminPanel.pages.images.create', $page->id) }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body">
                             @include('adminPanel.images.table')
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

