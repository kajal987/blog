<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->

    <link rel="stylesheet" href="{{ url('dist/css/skins/_all-skins.min.css')}}">

    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ url('bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
<!--<link rel="stylesheet" href="{{ url('bower_components/jvectormap/jquery-jvectormap.css')}}">-->
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ url('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{ url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{ url('plugins/iCheck/square/blue.css')}}">

    <script src="{{ url('js/jquery.slimscroll.js')}}"></script>

    <script src="{{ url('js/jquery-ui.js')}}"></script>
    <!-- Morris.js charts -->
    <script src="{{ url('bower_components/raphael/raphael.min.js')}}"></script>
    <script src="{{ url('bower_components/morris.js/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{ url('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <!-- jQuery Knob Chart -->
    <script src="{{ url('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{ url('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{ url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{ url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ url('bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('dist/js/adminlte.min.js')}}"></script>

    <script src="{{ url('bower_components/jquery/dist/jquery.min.js')}}"></script>

    <script src="{{ url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <script src="{{ url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <img src="{{ asset('logo/Adler.png')  }}" style="height: 35px;">
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                    @guest
                        <!-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>-->
                        @if (Route::has('register'))
                            <!--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>	-->
                            @endif
                        @else
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">

                                    <p>
                                        {{ Auth::user()->name }}
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
                                            {{ __('Sign out') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                    </li>
                @endguest
                <!-- Control Sidebar Toggle Button -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <!-- search form -->
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu linkclass" data-widget="tree">
                <li>
                    <a href="{{ url('users') }}" >
                        <i class="fa fa-dashboard"></i> <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="#" >
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
    @yield('content')
    <!-- /.content -->
        <div class="imagedisplay imgShowDiv">
            <div class="overlay"></div>
            <div class="img-show">
                <img src="">
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; <?php echo date('Y'); ?>  <a href="#"> sad</a></strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->
<input type="hidden" class="form-control" id="base_url"  value="{{url('')}}">
</body>





</html>
