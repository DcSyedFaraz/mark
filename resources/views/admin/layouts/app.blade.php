<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/toastr/toastr.min.css') }}">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div> --}}


        <!-- Main Sidebar Container -->
        {{-- <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">
                    @if (auth()->user()->hasRole('Admin'))
                        Admin Dashboard
                    @else
                        Board Member
                    @endif
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">


                        <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'menu-open' : '' }} ">
                            <a href="#"
                                class="nav-link nav-dropdown-toggle {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Dashboard
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('directory.index') }}"
                                class="nav-link {{ request()->routeIs('directory.index') ? 'active' : '' }}">
                                <i class="far fa-folder nav-icon"></i>
                                <p>Directory</p>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ request()->routeIs('structure.index') ? 'menu-open' : '' }} {{ request()->routeIs('plant.index') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link nav-dropdown-toggle {{ request()->routeIs('structure.index') ? 'active' : '' }} {{ request()->routeIs('plant.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                    Physical Infrastructure
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('structure.index') }}"
                                        class="nav-link {{ request()->routeIs('structure.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Water System Manuals </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('plant.index') }}"
                                        class="nav-link {{ request()->routeIs('plant.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Physical Plant Info. </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link nav-dropdown-toggle  ">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p>
                                    General Info
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('structure.index') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Assoc. Meeting Minutes </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('plant.index') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Assoc. By-Laws</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Water Testing Results</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Budget Reports</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Board Member List </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contact Info</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Survey Map</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>CC&R's Poncin Estate & Johnson Point History</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Articles of Incorporation</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('photo.index') }}"
                                class="nav-link {{ request()->routeIs('photo.index') ? 'active' : '' }}">
                                <i class="far fa-image  nav-icon"></i>
                                <p>Photo Gallery</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('events.index') }}"
                                class="nav-link {{ request()->routeIs('events.index') ? 'active' : '' }}">
                                <i class="far fa-calendar-alt nav-icon"></i>
                                <p>Event Calendar</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('bussiness') }}"
                                class="nav-link {{ request()->routeIs('bussiness') ? 'active' : '' }}">
                                <i class="far fa-address-book  nav-icon"></i>
                                <p>Resource Directory</p>
                            </a>
                        </li>
                        @if (auth()->user()->hasRole('Admin'))
                            <li class="nav-item {{ request()->routeIs('roles.index') ? 'menu-open' : '' }} ">
                                <a href="#"
                                    class="nav-link nav-dropdown-toggle {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>
                                        Manage Roles
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}"
                                            class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>List Roles</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Role</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li
                                class="nav-item {{ request()->routeIs('users.index') ? 'menu-open' : '' }} {{ request()->routeIs('users.create') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link nav-dropdown-toggle {{ request()->routeIs('users.index') ? 'active' : '' }} {{ request()->routeIs('users.create') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>
                                        Manage Users
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}"
                                            class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>List Users</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('users.create') }}"
                                            class="nav-link {{ request()->routeIs('users.create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Users</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li
                                class="nav-item {{ request()->routeIs('permission.index') ? 'menu-open' : '' }} {{ request()->routeIs('permission.create') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link nav-dropdown-toggle {{ request()->routeIs('permission.index') ? 'active' : '' }} {{ request()->routeIs('permission.create') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>
                                        Manage Permissions
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{ route('permission.index') }}"
                                            class="nav-link {{ request()->routeIs('permission.index') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>List Permissions</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('permission.create') }}"
                                            class="nav-link {{ request()->routeIs('permission.create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Permission</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        @endif




                        <li
                            class="nav-item {{ request()->routeIs('profile.index') ? 'menu-open' : '' }} {{ request()->routeIs('change_password') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link nav-dropdown-toggle  {{ request()->routeIs('profile.index') ? 'active' : '' }} {{ request()->routeIs('games.index') ? 'active' : '' }} {{ request()->routeIs('change_password') ? 'menu-open' : '' }}">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Account Setting
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('profile.index') }}"
                                        class="nav-link {{ request()->routeIs('profile.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profile</p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{ route('change_password') }}"
                                        class="nav-link {{ request()->routeIs('change_password') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Change Password</p>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        <li class="nav-item">
                            <a href="{{ url('/logout') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside> --}}
        <aside id="sidebar" class="sidebars">

            <div class="d-flex align-items-center justify-content-between">
                <a href="#" class="logo d-flex align-items-center">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="">
                </a>
            </div>

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-heading">GENERAL</li>

                <li class="nav-item">
                    <a class="nav-link collapsed {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-grid-3x3-gap-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed {{ request()->routeIs('directory.index') ? 'active' : '' }}"
                        href="{{ route('directory.index') }}">
                        <i class="bi bi-heart"></i>
                        <span>Directory</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link drop-nav collapse " data-bs-target="#components-nav" data-bs-toggle="collapse"
                        href="#">
                        <i class="bi bi-signpost-2"></i>
                        <span>Physical Infrastructure</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav"
                        class="nav-content collapse {{ request()->routeIs(['structure.index', 'plant.index']) ? 'show' : '' }}"
                        data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="nav-links {{ request()->routeIs('structure.index') ? 'active' : '' }}"
                                href="{{ route('structure.index') }}">
                                <i class="bi bi-circle"></i><span>Water System Manuals</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-links {{ request()->routeIs('plant.index') ? 'active' : '' }}"
                                href="{{ route('plant.index') }}">
                                <i class="bi bi-circle"></i><span>Physical Plant Info.</span>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link drop-nav collapse " data-bs-target="#components-info" data-bs-toggle="collapse"
                        href="#">
                        <i class="bi bi-card-list"></i>
                        <span>General Info</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-info"
                        class="nav-content collapse {{ request()->routeIs(['#', '#']) ? 'show' : '' }}"
                        data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="nav-links {{ request()->routeIs('#') ? 'active' : '' }}" href="#">
                                <i class="bi bi-circle"></i><span>Assoc. Meeting Minutes</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-links {{ request()->routeIs('#') ? 'active' : '' }}" href="#">
                                <i class="bi bi-circle"></i><span>Assoc. By-Laws</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-links {{ request()->routeIs('#') ? 'active' : '' }}" href="#">
                                <i class="bi bi-circle"></i><span>Water Testing Results</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-links {{ request()->routeIs('#') ? 'active' : '' }}" href="#">
                                <i class="bi bi-circle"></i><span>Budget Reports</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-links {{ request()->routeIs('#') ? 'active' : '' }}" href="#">
                                <i class="bi bi-circle"></i><span>Board Member List</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-links {{ request()->routeIs('#') ? 'active' : '' }}" href="#">
                                <i class="bi bi-circle"></i><span>Contact Info</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-links {{ request()->routeIs('#') ? 'active' : '' }}" href="#">
                                <i class="bi bi-circle"></i><span>Survey Map</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-links {{ request()->routeIs('#') ? 'active' : '' }}" href="#">
                                <i class="bi bi-circle"></i><span>CC&R's Poncin Estate & Johnson Point History</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-links {{ request()->routeIs('#') ? 'active' : '' }}" href="#">
                                <i class="bi bi-circle"></i><span>Articles of Incorporation</span>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed {{ request()->routeIs('photo.*') ? 'active' : '' }}"
                        href="{{ route('photo.index') }}">
                        <i class="bi bi-card-image"></i>
                        <span>Photo Gallery</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed {{ request()->routeIs('events.*') ? 'active' : '' }}"
                        href="{{ route('events.index') }}">
                        <i class="bi bi-calendar3"></i>
                        <span>Event Calender</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed {{ request()->routeIs(['bussiness','search']) ? 'active' : '' }}"
                        href="{{ route('bussiness') }}">
                        <i class="bi bi-file-earmark-binary"></i>
                        <span>Resource Directory</span>
                    </a>
                </li>

                @if (auth()->user()->hasRole('Admin'))
                    <li class="nav-item">
                        <a class="nav-link collapsed {{ request()->routeIs('roles.*') ? 'active' : '' }}"
                            href="{{ route('roles.index') }}">
                            <i class="bi bi-menu-up"></i>
                            <span>Manage Roles</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed {{ request()->routeIs('users.*') ? 'active' : '' }}"
                            href="{{ route('users.index') }}">
                            <i class="bi bi-menu-up"></i>
                            <span>Manage User</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed {{ request()->routeIs('permission.*') ? 'active' : '' }}"
                            href="{{ route('permission.index') }}">
                            <i class="bi bi-menu-up"></i>
                            <span>Manage Permissions</span>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link collapsed {{ request()->routeIs('profile.*') ? 'active' : '' }}"
                        href="{{ route('profile.index') }}">
                        <i class="bi bi-menu-up"></i>
                        <span>Account Setting</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed {{ request()->routeIs('change_password') ? 'active' : '' }}"
                        href="{{ route('change_password') }}">
                        <i class="bi bi-menu-up"></i>
                        <span>Change Password</span>
                    </a>
                </li>

            </ul>
            <!-- ======= SYSTEM MENU ======= -->
            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-heading">SYSTEM</li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#">
                        <i class="bi bi-info-circle"></i>
                        <span>Help Center</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#">
                        <i class="bi bi-gear"></i>
                        <span>Settings</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ url('/logout') }}">
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>

        </aside>
        <div class="content-wrapper">
            <main id="main" class="main">

                <div class="pagetitle">
                    <h1>Hallo, {{ Auth::user()->name }}</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                @if (auth()->user()->hasRole('Admin'))
                                    Admin Dashboard
                                @else
                                    Board Member Dashboard
                                @endif
                            </li>
                        </ol>
                    </nav>
                </div>

                <!-- End Page Title -->

                <section class="section dashboard">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">

                                <!-- Search Bar -->
                                @if (request()->routeIs('bussiness'))
                                <div class="search-bar">
                                    <form class="search-form d-flex align-items-center" method="get"
                                        action="{{route('search')}}">
                                        @csrf
                                        <input type="text" name="query" placeholder="Search"
                                            id="customSearchInput" title="Enter search keyword">
                                        <button type="submit" title="Search"><i
                                                class="bi bi-search"></i></button>
                                    </form>
                                </div><!-- END Search Bar -->
                                @else
                                    <div class="search-bar">
                                        <form class="search-form d-flex align-items-center" method="GET"
                                            action="#">
                                            <input type="text" name="query" placeholder="Search"
                                                id="customSearchInput" title="Enter search keyword">
                                            <button type="submit" title="Search"><i
                                                    class="bi bi-search"></i></button>
                                        </form>
                                    </div><!-- END Search Bar -->
                                @endif

                                @yield('content')
                            </div>
                        </div>

                        <!-- Right side columns -->
                        <div class="col-lg-4 right-side-col">
                            <div class="login0">
                                {{-- <a class="login-img" href="#"><img
                                        src="{{ asset('assets/img/notification.png') }}" alt=""></a> --}}
                                <a class="login-img" href="#">

                                    @if (!empty(auth()->user()->profile_picture))
                                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                                            style="width: 60px; border-radius: 50%;    height: 60px;" alt="">
                                    @else
                                        <img src="{{ asset('assets/img/default.png') }}"
                                            style="width: 60px; border-radius: 50%;    height: 60px;" alt="">
                                    @endif
                                </a>


                            </div>

                            <div class="card">

                                <div class="card-bodys pb-0">
                                    <div class="news">
                                        @php
                                            $boards = App\Models\User::withRole('board_member')->get();
                                        @endphp
                                        <h4 class="badge badge-success my-3">Board Members</h4>
                                        @foreach ($boards as $board)
                                            <div class="post-item clearfix">

                                                @if (empty($board->profile_picture))
                                                    <img src="{{ asset('assets/img/default.png') }}" class="def"
                                                        alt="">
                                                @else
                                                    <img src="{{ asset('storage/' . $board->profile_picture) }}"
                                                        class="def" alt="">
                                                @endif

                                                <h4><a href="#">{{ $board->name }}</a></h4>
                                                <p>{{ $board->email }}</p>
                                                <a href="{{ route('users.edit', $board->id) }}" title="Edit">

                                                    <i class="bi bi-arrow-right-short"></i>
                                                </a>
                                            </div>
                                        @endforeach
                                        @php
                                            $users = App\Models\User::withRole('member')
                                                ->whereaccess('approved')
                                                ->get();
                                        @endphp
                                        <h4 class="badge badge-success my-3">Members</h4>
                                        @foreach ($users as $user)
                                            <div class="post-item clearfix">


                                                @if (empty($user->profile_picture))
                                                    <img src="{{ asset('assets/img/default.png') }}" class="def"
                                                        alt="">
                                                @else
                                                    <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                                        class="def" alt="">
                                                @endif


                                                <h4><a href="#">{{ $user->name }}</a></h4>
                                                <p>{{ $user->email }}</p>
                                                <a href="{{ route('users.edit', $user->id) }}" title="Edit">

                                                    <i class="bi bi-arrow-right-short"></i>
                                                </a>
                                            </div>
                                        @endforeach


                                    </div><!-- End sidebar recent posts-->

                                </div>
                            </div><!-- End News & Updates -->

                        </div><!-- End Right side columns -->

                    </div>
                </section>

            </main><!-- End #main -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    {{-- LFM --}}

    <!-- jQuery -->
    <script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script>
        //    var route_prefix = "/filemanager";
    </script>

    <!-- CKEditor init -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('/admin/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('/admin/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('/admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('/admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/admin/dist/js/adminlte.js') }}"></script>


    <!-- Toastr -->
    <script src="{{ asset('/admin/plugins/toastr/toastr.min.js') }}"></script>
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}")
        @endif
        @if (session('warning'))
            toastr.warning("{{ session('warning') }}")
        @endif
        @if (session('info'))
            toastr.info("{{ session('info') }}")
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>

    <!-- Change password -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js" type="text/javascript">
    </script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <!-- Include DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <!-- Include DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">


    <!-- DataTables  & Plugins -->
    {{-- <script src="{{ asset('/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script> --}}
    <!-- Summernote -->
    <script src="{{ asset('/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('js/style.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <script>
        $(document).ready(function() {


            var dataTable = $("#example1").DataTable({
                "responsive": true,
                "ordering": true,
                "lengthChange": false,
                "autoWidth": true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

            dataTable.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            var example2Table = $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "buttons": ["csv", "excel", "pdf", "print"]
            });

            example2Table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

            $('#customSearchInput').on('keyup', function() {
                dataTable.search(this.value).draw();
            });
        });
    </script>
    @yield('script')
</body>

</html>
