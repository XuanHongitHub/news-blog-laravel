<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title', 'Admin') | {{ config('app.name') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    {{-- Favicons --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/admin/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/admin/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/admin/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/admin/favicon/site.webmanifest') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @yield('css')

    @vite([ 'resources/js/app.js'])

</head>

<body class="hold-transition sidebar-mini layout-fixed {{ Auth::user()->mode }}-mode">

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-{{ Auth::user()->mode }} navbar-light sticky-top">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-primary btn-sm mx-2" href="{{ url('/') }}">Trang Người Dùng</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input type="submit" name="submit" value="Đăng Xuất" class="btn btn-primary btn-sm">
                        </form>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-{{ Auth::user()->mode }}-primary elevation-4">
            <!-- Brand Logo -->

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if (Auth::user()->avatar != null)
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
                        @else
                        <img src="{{ asset('storage/' . Auth::user()->avatar ) }}" class="img-circle elevation-2"
                            alt="User Image">
                        @endif
                    </div>
                    <div class="info">
                        <a href="" class="d-block">{{ config('app.name') }}</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{url('admin')}}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Bảng Điều Khiển</p>
                            </a>
                        </li>
                        {{-- @role('admin') --}}
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                                class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Người Dùng
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}"
                                class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>Danh Mục
                                    <span class="badge badge-warning right"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('news.index') }}"
                                class="nav-link {{ Request::is('admin/news*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>Bài viết
                                    <span class="badge badge-primary right"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('comments.index') }}"
                                class="nav-link {{ Request::is('admin/comments*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-comments"></i>
                                <p>Bình luận
                                    <span class="badge badge-primary right"></span>
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="" class="nav-link {{ Route::is('admin.profile.edit') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-id-card"></i>
                                <p>Profile</p>
                            </a>
                        </li> --}}

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            @yield('content')
            <!-- /.card -->

        </section>

        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    <footer class="main-footer">
        <strong>Copyright © {{ date('Y') }} <a href="{{ url('admin') }}">XuanHong</a>.</strong> All rights reserved.
    </footer>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('assets/admin/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('assets/admin/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('assets/admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('assets/admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/admin/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/admin/dist/js/pages/dashboard.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/pdfmake.min.js" ></script>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/vfs_fonts.js" ></script>    
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    {{-- <script src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script> --}}
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script> --}}
    <!-- Page specific script -->
    <!-- Toast cdn -->
    <script src="{{ asset('assets/admin/dist/js/toastr.min.js') }}" ></script> 
    {{-- summernote --}}

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300
            });
        });
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        // Toastr alerts
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
    </script>
    @if (session()->has('success'))
    <script>
        toastr.success("{{ session()->get('success') }}")
    </script>
    @endif
    @if (session()->has('warning'))
    <script>
        toastr.warning("{{ session()->get('warning') }}")
    </script>
    @endif
    @if (session()->has('info'))
    <script>
        toastr.info("{{ session()->get('info') }}")
    </script>
    @endif
    @if (session()->has('error'))
    <script>
        toastr.error("{{ session()->get('error') }}")
    </script>
    @endif

    @yield('js')
</body>

</html>