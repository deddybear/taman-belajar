<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loader.min.css') }}">
    @yield('css')

    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('icon/favicon.ico') }}">
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
     <!-- Loadder -->
      <div id="loader-wrapper">
	    <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> 
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link">Selamat Datang {{ request()->session()->get('nama') }}</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a class="brand-link elevation-4">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="my-3">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent text-xs" data-widget="treeview"
                        role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                        <li class="nav-header">FITUR ADMIN</li>
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Kembali ke Halaman Utama</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/panel-admin/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Widgets</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Informasi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item has-treeview">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-user-graduate"></i>
                                        <p>
                                            Informasi Akademik
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>                                   
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item has-treeview">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-school nav-icon"></i>
                                                <p>
                                                    SD
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="/panel-admin/ppdb-sd" class="nav-link">
                                                        <i class="fas fa-copy nav-icon"></i>
                                                        <p>PPDB - SD</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="/panel-admin/struktural/sd" class="nav-link">
                                                        <i class="fas fa-sitemap nav-icon"></i>
                                                        <p>Struktural - SD</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="/panel-admin/profile-sd" class="nav-link">
                                                        <i class="nav-icon fas fa-crosshairs"></i>
                                                        <p>Profile Sekolah SD</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="/panel-admin/data-siswa-sd" class="nav-link">
                                                        <i class="nav-icon fas fa-journal-whills"></i>
                                                        <p>Data Siswa SD</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item has-treeview">
                                            <a href="/panel-admin/ppdb-smp" class="nav-link">
                                                <i class="fas fa-school nav-icon"></i>
                                                <p>
                                                    SMP
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="/panel-admin/ppdb-smp" class="nav-link">
                                                        <i class="fas fa-copy nav-icon"></i>
                                                        <p>PPDB - SMP</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="/panel-admin/struktural/smp" class="nav-link">
                                                        <i class="fas fa-sitemap nav-icon"></i>
                                                        <p>Struktural - SMP</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="/panel-admin/profile-smp" class="nav-link">
                                                        <i class="nav-icon fas fa-crosshairs"></i>
                                                        <p>Profile Sekolah SMP</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="/panel-admin/data-siswa-smp" class="nav-link">
                                                        <i class="nav-icon fas fa-journal-whills"></i>
                                                        <p>Data Siswa SMP</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <li class="nav-item">
                                        <a href="/panel-admin/berita" class="nav-link">
                                            <i class="nav-icon far fa-calendar-plus"></i>
                                            <p>Data Berita</p>
                                        </a>
                                    </li>
                                </li>
                            </ul>
                        </li>                     
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cloud-upload-alt"></i>
                                <p>
                                    Upload Gallery
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/panel-admin/gallery-foto" class="nav-link">
                                        <i class="nav-icon far fa-image"></i>
                                        <p>
                                            Upload Foto
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/panel-admin/gallery-video" class="nav-link">
                                        <i class="nav-icon fas fa-code"></i>
                                        <p>
                                            Embed Video
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Account
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if (request()->session()->get('username') == 'admin' )
                                <li class="nav-item">
                                    <a href="/panel-admin/register" class="nav-link">
                                        <i class="nav-icon fas fa-address-card"></i>
                                        <p>
                                            Daftar Akun Baru 
                                        </p>
                                    </a>
                                </li>
                                 @endif
                                <li class="nav-item">
                                    <a href="/panel-admin/edit-account" class="nav-link">
                                        <i class="nav-icon fas fa-address-card"></i>
                                        <p>
                                            Edit Account
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin/logout') }}" class="nav-link">
                                        <i class="nav-icon fas fa-sign-out-alt"></i>
                                        <p>
                                            Logout
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        @yield('content')
       
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>
    <script>
        var url = "{{ url('/') }}/"
    </script>
    <script src="{{ asset('adminlte/js/moment.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/sweetalert.min.js') }}"></script>
    {{-- <script src="{{ asset('adminlte/js/jquery-ui.min.js') }}"></script> --}}
    <script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('adminlte/summernote.js') }}"></script>
    <script src="{{ asset('adminlte/table.js') }}"></script>
    <script src="{{ asset('adminlte/mergeRow.js') }}"></script>
    <script src="{{ asset('adminlte/mergeCell.js') }}"></script>
    <script src="{{ asset('adminlte/js/demo.js') }}"></script>
    <script src="{{ asset('adminlte/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/jquery.overlayScrollbars.min.js') }}"></script>
    @yield('script')
</body>

</html>
