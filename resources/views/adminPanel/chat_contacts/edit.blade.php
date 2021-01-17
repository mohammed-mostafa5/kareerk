@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('adminPanel.chatContacts.index') !!}">@lang('models/chatContacts.singular')</a>
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
                              <strong>Edit @lang('models/chatContacts.singular')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($chatContact, ['route' => ['adminPanel.chatContacts.update', $chatContact->id], 'method' => 'patch']) !!}

                              @include('adminPanel.chat_contacts.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection