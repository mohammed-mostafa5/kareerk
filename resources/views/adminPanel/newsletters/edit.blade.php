@extends('adminPanel.layouts.app')

@section('title', __('models/newsletters.plural') . ' ' . $settings->where('key', 'title_prefix')->first()->value)

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('adminPanel.newsletters.index') !!}">@lang('models/newsletters.singular')</a>
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
                              <strong>Edit @lang('models/newsletters.singular')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($newsletter, ['route' => ['adminPanel.newsletters.update', $newsletter->id], 'method' => 'patch']) !!}

                              @include('adminPanel.newsletters.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection