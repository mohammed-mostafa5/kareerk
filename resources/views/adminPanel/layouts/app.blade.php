<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <title>@yield('title', $settings->where('key', 'site_name')->first()->value)</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/css/coreui.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/coreui-icons-free@1.0.1-alpha.1/coreui-icons-free.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
    <link href='{{ asset('vendor/choosen/css/chosen.min.css') }}' rel='stylesheet' type='text/css'>
    <script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>


    <link rel="stylesheet" href="{{ asset('css/bootstrap-iconpicker.min.css') }}">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/'.$settings->where('key', 'theme')->first()->value.'.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="shortcut icon" href="{{ asset('uploads/images/original/'.$settings->where('key', 'favicon')->first()->value) }}">
    <style>
        table td img {
            width: 100px;
        }
    </style>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ route('website.home') }}">
            @if ($settings->where('key', 'theme')->first()->value == 'wordpress')
            {{config('app.name')}}
            @else
            <img class="navbar-brand-full" src="{{$settings->where('key', 'theme')->first()->value == 'wordpress' ? config('app.name') : asset('uploads/images/original/'.$settings->where('key', 'logo')->first()->value ) }}" width="120" height="50" alt="{{$settings->where('key', 'site_name')->first()->value}}">
            @endif
            @if ($settings->where('key', 'theme')->first()->value == 'wordpress')
            {{-- {{config('app.name')}} --}}
            @else
            <img class="navbar-brand-minimized" src="{{ asset('uploads/images/original/'.$settings->where('key', 'logo')->first()->value) }}" width="30" height="30" alt="{{$settings->where('key', 'site_name')->first()->value}}">
            @endif
        </a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item d-md-down-none">
                {{-- <a class="nav-link" href="#">
                <i class="icon-bell"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a> --}}
            </li>
            <li class="nav-item dropdown text-capitalize">
                <a class="nav-link" style="margin-right: 10px" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    {{--  <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-envelope-o"></i> @lang('auth.app.messages')
                    <span class="badge badge-success">42</span>
                </a>
                <div class="dropdown-header text-center">
                    <strong>@lang('auth.app.settings')</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-user"></i> @lang('auth.app.profile')</a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-wrench"></i> @lang('auth.app.settings')</a>  --}}
                    {{-- <div class="dropdown-divider"></div> --}}
                    {{-- <a class="dropdown-item" href="{{route('adminPanel.customSettings.show')}}" target="/">
                    <i class="fa fa-cog"></i> @lang('models/customSettings.plural')
                    </a> --}}
                    <a class="dropdown-item" href="/" target="/">
                        <i class="fa fa-eye"></i> @lang('auth.app.view_site')
                    </a>
                    <a class="dropdown-item" href="{{ route('adminPanel.logout') }}" class="btn btn-default btn-flat">
                        <i class="fa fa-lock"></i>@lang('auth.sign_out')
                    </a>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">
        @include('adminPanel.layouts.sidebar')
        <main class="main">
            @yield('content')
        </main>
    </div>
    <footer class="app-footer">
        <div>
            <a href="{{route('website.home')}}">{{$settings->where('key', 'site_name')->first()->value}}</a>
            <span>&copy; {{date('Y')}}.</span>
        </div>
        <div class="ml-auto">
            <span>Powered by</span>
            <a href="https://www.techvillageco.com/" target="_blanck">Tech Village</a>
        </div>
    </footer>
</body>

<!-- jQuery 3.1.1 -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
</script>

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script> --}}
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>








<script src='{{ asset('vendor/choosen/js/chosen.jquery.min.js') }}'></script>
<script>
    $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"});
</script>
<script src='{{ asset('vendor/customs/js/dynamic-form-fields.js') }}'></script>



<script src="{{ asset('js/bootstrap-iconpicker.bundle.min.js')}}"></script>


<script type="text/javascript" language="javascript">
    $(document).ready( function () {
        $('.table').DataTable( {

        } );

    } );
</script>


@yield('scripts')

</html>
