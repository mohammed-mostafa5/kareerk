@extends('adminPanel.layouts.app')

@section('content')

<div class="container-fluid pt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="card text-center" style="box-shadow: 3px 6px 8px -3px #000000; border:0; ">
                    <div class="card-body text-light" style="background-color: #39f">
                        <h2 class="card-title"><strong>{{$freelancersCount}}</strong></h2>
                    </div>
                    <div class="card-footer text-light" style="background-color: rgb(46, 140, 235)">
                        <a class="text-light" href="{{route('adminPanel.freelancers.index')}}">
                            <h4>Freelancers</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card text-center" style="box-shadow: 3px 6px 8px -3px #000000; border:0;">
                    <div class="card-body text-light" style="background-color: #f9b115">
                        <h2 class="card-title"><strong>{{$clientsCount}}</strong></h2>
                    </div>
                    <div class="card-footer text-light" style="background-color: #eca712">
                        <a href="{{route('adminPanel.clients.index')}}" class="text-light">
                            <h4>Clients</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card text-center" style="box-shadow: 3px 6px 8px -3px #000000; border:0;">
                    <div class="card-body text-light" style="background-color: #e55353">
                        <h2 class="card-title"><strong>{{$jobsCount}}</strong></h2>
                    </div>
                    <div class="card-footer text-light" style="background-color: #d44b4b">
                        <a href="{{route('adminPanel.jobs.index')}}" class="text-light">
                            <h4>Jobs</h4>
                        </a>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>
</div>
@endsection
