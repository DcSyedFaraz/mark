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


        <aside id="sidebar" class="sidebars">

            <div class="d-flex align-items-center justify-content-between">
                <a href="#" class="logo d-flex align-items-center">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="">
                </a>
            </div>

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-heading">GENERAL</li>

                <li class="nav-item">
                    <a class="nav-link collapsed {{ request()->routeIs('voting.dashboard') ? 'active' : '' }}"
                        href="{{ route('voting.dashboard') }}">
                        <i class="bi bi-grid-3x3-gap-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed {{ request()->routeIs('directorys.new') ? 'active' : '' }}"
                        href="{{ route('directorys.new') }}">
                        <i class="bi bi-heart"></i>
                        <span>Directory</span>
                    </a>
                </li>
                @if (auth()->user()->status == 'voting')
                    <li class="nav-item">
                        <a class="nav-link drop-nav collapse " data-bs-target="#components-nav"
                            data-bs-toggle="collapse" href="#">
                            <i class="bi bi-signpost-2"></i>
                            <span>Physical Infrastructure</span>
                            <i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="components-nav"
                            class="nav-content collapse {{ request()->routeIs(['structure.new', 'plant.new']) ? 'show' : '' }}"
                            data-bs-parent="#sidebar-nav">
                            <li>
                                <a class="nav-links {{ request()->routeIs('structure.new') ? 'active' : '' }}"
                                    href="{{ route('structure.new') }}">
                                    <i class="bi bi-circle"></i><span>Water System Manuals</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-links {{ request()->routeIs('plant.new') ? 'active' : '' }}"
                                    href="{{ route('plant.new') }}">
                                    <i class="bi bi-circle"></i><span>Physical Plant Info.</span>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link drop-nav collapse " data-bs-target="#components-info"
                            data-bs-toggle="collapse" href="#">
                            <i class="bi bi-card-list"></i>
                            <span>General Info</span>
                            <i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="components-info"
                            class="nav-content collapse {{ request()->routeIs(['general.*', '#']) ? 'show' : '' }}"
                            data-bs-parent="#sidebar-nav">
                            <li>
                                <a class="nav-links {{ request()->routeIs('general.asm') ? 'active' : '' }}"
                                    href="{{ route('general.asm') }}">
                                    <i class="bi bi-circle"></i><span>Assoc. Meeting Minutes</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-links {{ request()->routeIs('general.abl') ? 'active' : '' }}"
                                    href="{{ route('general.abl') }}">
                                    <i class="bi bi-circle"></i><span>Assoc. By-Laws</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-links {{ request()->routeIs('general.wtr') ? 'active' : '' }}"
                                    href="{{ route('general.wtr') }}">
                                    <i class="bi bi-circle"></i><span>Water Testing Results</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-links {{ request()->routeIs('general.br') ? 'active' : '' }}"
                                    href="{{ route('general.br') }}">
                                    <i class="bi bi-circle"></i><span>Budget Reports</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-links {{ request()->routeIs('general.bml') ? 'active' : '' }}"
                                    href="{{ route('general.bml') }}">
                                    <i class="bi bi-circle"></i><span>Board Member List</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-links {{ request()->routeIs('general.ci') ? 'active' : '' }}"
                                    href="{{ route('general.ci') }}">
                                    <i class="bi bi-circle"></i><span>Contact Info</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-links {{ request()->routeIs('general.sm') ? 'active' : '' }}"
                                    href="{{ route('general.sm') }}">
                                    <i class="bi bi-circle"></i><span>Survey Map</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-links {{ request()->routeIs('general.ccr') ? 'active' : '' }}"
                                    href="{{ route('general.ccr') }}">
                                    <i class="bi bi-circle"></i><span>CC&R's Poncin Estate & Johnson Point
                                        History</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-links {{ request()->routeIs('general.aoi') ? 'active' : '' }}"
                                    href="{{ route('general.aoi') }}">
                                    <i class="bi bi-circle"></i><span>Articles of Incorporation</span>
                                </a>
                            </li>


                        </ul>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link collapsed {{ request()->routeIs('photos.*') ? 'active' : '' }}"
                        href="{{ route('photos.index') }}">
                        <i class="bi bi-card-image"></i>
                        <span>Photo Gallery</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed {{ request()->routeIs(['event.*', 'events.calendar','calendar.show']) ? 'active' : '' }}"
                        href="{{ route('event.index') }}">
                        <i class="bi bi-calendar3"></i>
                        <span>Event Calender</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed {{ request()->routeIs(['bussinesss', 'search']) ? 'active' : '' }}"
                        href="{{ route('bussinesss') }}">
                        <i class="bi bi-file-earmark-binary"></i>
                        <span>Resource Directory</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed {{ request()->routeIs(['polls.*']) ? 'active' : '' }}"
                        href="{{ route('polls.index') }}">
                        <i class="bi bi-calendar3"></i>
                        <span>Poll</span>
                    </a>
                </li>
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

                <div class="row ">

                    <div class="pagetitle col-10 d-flex">
                        <div class="col-1">
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
                        <div class="col-11 mt-1">

                            <h1 class="mt-2">Hello, {{ Auth::user()->name }}</h1>

                        </div>
                    </div>

                </div>

                <!-- End Page Title -->

                <section class="section dashboard">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">

                                @if (request()->routeIs('bussinesss'))
                                    <div class="search-bar">
                                        <form class="search-form d-flex align-items-center" method="get"
                                            action="{{ route('search') }}">
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
                        {{-- <div class="col-lg-4 right-side-col">
                            <div class="login0">
                                <a class="login-img" href="#"><img
                                        src="{{ asset('assets/img/notification.png') }}" alt=""></a>
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

                                            </div>
                                        @endforeach
                                        @php
                                            // $users = App\Models\User::withRole('member')->get();
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

                                            </div>
                                        @endforeach


                                    </div><!-- End sidebar recent posts-->

                                </div>
                            </div><!-- End News & Updates -->

                        </div><!-- End Right side columns --> --}}

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
    <!-- jQuery -->
    {{-- <script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script> --}}
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
            $('#summernote').summernote();
            $('#summernote1').summernote();

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
