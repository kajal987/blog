<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- header -->
@extends('layouts.backend.header')
<!-- End header -->

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            {{--            @if(file_exists(public_path('uploads/').Auth::user()->profilePicture) && Auth::user()->profilePicture)--}}
            {{--                <img src="{{ url('uploads/'. Auth::user()->profilePicture) }}" class="profilepic2 img-circle"--}}
            {{--                     alt="User Image" style="height: 35px;">--}}
            {{--            @else--}}
            {{--                <img src="{{ url('uploads/defaultUser.png') }}" class="profilepic2 img-circle" alt="User Image"--}}
            {{--                     style="height: 35px;">--}}
            {{--            @endif--}}
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
                                    @if(file_exists(public_path('uploads/').Auth::user()->profilePicture) && Auth::user()->profilePicture)
                                        <img src="{{ url('uploads/'. Auth::user()->profilePicture) }}"
                                             class="profilepic2 img-circle" alt="User Image">
                                    @else
                                        <img src="{{ url('uploads/defaultUser.png') }}" class="profilepic2 img-circle"
                                             alt="User Image">
                                    @endif
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
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
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


    <!-- side Bar -->
@extends('layouts.backend.sidebar')

<!-- End -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
    @yield('content')
    <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <!-- footer  -->
@extends('layouts.backend.footer')
<!-- End footer -->

