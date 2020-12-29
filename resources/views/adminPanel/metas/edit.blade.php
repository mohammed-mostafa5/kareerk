@extends('adminPanel.layouts.app')

@section('title', __('models/metas.plural') . ' ' . $settings->where('key', 'title_prefix')->first()->value)

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('adminPanel.metas.index') !!}">@lang('models/metas.singular')</a>
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
                              <strong>Edit @lang('models/metas.singular')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($meta, ['route' => ['adminPanel.metas.update', $meta->id], 'method' => 'patch']) !!}

                              @include('adminPanel.metas.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection