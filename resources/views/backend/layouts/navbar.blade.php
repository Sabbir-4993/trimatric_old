<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title') | Trimatric</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/img/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/css/all.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome/css/fontawesome.min.css') }}">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables/datatables.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">

    @yield('css')
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('backend/img/2_Logo PNG (Black).png') }}" alt="Logo">
            </a>
            <a href="{{ route('home') }}" class="logo logo-small">
                <img src="{{ asset('backend/img/logo-small.png') }}" alt="Logo" width="30" height="30">
            </a>
        </div>
        <!-- /Logo -->

        <!-- Sidebar Toggle -->
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars"></i>
        </a>
        <!-- Mobile Menu Toggle -->
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>
        <ul class="nav user-menu">

            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow main-drop">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img">
                        @if (Auth::check())
                        <img src="{{ asset('backend/img/favicon.ico') }}" alt="">
                        <span class="status online"></span>
                    </span>
                    <span>{{ Auth::User()->name }}</span>
                    @endif

                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><i data-feather="user" class="mr-1"></i> Profile</a>
                     <a class="dropdown-item" href="{{route('settings')}}"><i data-feather="settings" class="mr-1"></i> Settings</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
					    document.getElementById('logout-form').submit();">
                        <i data-feather="log-out" class="mr-1"></i> {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            <!-- /User Menu -->

        </ul>
        <!-- /Header Menu -->

    </div>
    <!-- /Header -->

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title"><span>Main</span></li>
                    <li class="@yield('dashboard')">
                        <a href="{{ route('home') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
                    </li>
                    <li class="@yield('slider')" >
                        <a href="{{route('slider.index')}}"><i class="fas fa-user"></i> <span>Slider</span></a>
                    </li>
                    <li class="@yield('project')" >
                        <a href="{{ route('backend-project.index') }}"><i class="fas fa-toolbox"></i> <span>Project</span></a>
                    </li>
                    <li class="@yield('portfolio')" >
                        <a href="{{ route('backend-portfolio.index') }}"><i class="fas fa-image"></i> <span>Portfolio</span></a>
                    </li>
                    <li class="@yield('client')" >
                        <a href="{{ route('backend-client.index') }}"><i class="fas fa-user-circle"></i> <span>Client</span></a>
                    </li>
                    <li class="@yield('circular')" >
                        <a href="{{ route('backend-circular.create') }}"><i class="fas fa-user-circle"></i> <span>Circular</span></a>
                    </li>
                    <li class="@yield('circular_list')" >
                        <a href="{{ route('backend-circular.index') }}"><i class="fas fa-toolbox"></i> <span>Circular List</span></a>
                    </li>
                    <li class="@yield('cv')" >
                        <a href="{{ route('cv.index') }}"><i class="fas fa-user-circle"></i> <span>CV</span></a>
                    </li>
                    <li class="@yield('news')" >
                        <a href="{{ route('backend-contact.index') }}"><i class="fas fa-user-circle"></i> <span>News Letter</span></a>
                    </li>
                    <li class="@yield('team')" >
                        <a href="{{ route('team_member.list.index') }}"><i class="fas fa-user-circle"></i> <span>Team Member</span></a>
                    </li>
{{--                    <li class="@yield('testimonial')" >--}}
{{--                        <a href="{{ route('testimonial.testimonial.index') }}"><i class="fas fa-user-circle"></i> <span>Testimonial</span></a>--}}
{{--                    </li>--}}
                    <li class="menu-title"><span>Site Settings</span></li>
                    <li class="@yield('site')" >
                        <a href="{{route('settings')}}"><i class="fas fa-user-circle"></i> <span>Site Settings</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->

    @yield('content')

</div>
