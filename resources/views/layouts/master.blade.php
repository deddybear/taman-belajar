<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav-mobile.css') }}">
    @yield('css')

    <!-- Script -->
    <script src="{{ asset('bootstrap/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('js/navigation.js') }}"></script>
    <script src="{{ asset('js/master.js') }}"></script>
    @yield('script')

    <title>@yield('title')</title>
        <link rel="icon" href="{{asset('icon/favicon.ico') }}">
</head>

<body id="top">
    <div class="desk_navbar">
        @include('layouts.navigation')
    </div>
    <div class="wrapper">
        @include('layouts.navigation-mobile')
        <div style="padding: 50px 15px;" class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-xl-10">
                        <div class="header-logo">
                            <a href="{{ url('') }}">
                                <img class="header-img" src="{{ asset('images/logo.png') }}" alt="example">
                            </a>
                        </div>
                        <div class="header-text">
                            <h2 style="color: #ff0; font-weight: bold;">YAYASAN PENDIDIKAN TAMAN BELAJAR</h2>
                            <p>
                                <strong>JL. Kedung Cowek No. 220, Kenjeran, Surabaya.<br>  
                                    Telepon 031-515 01138 | 031-515 01288</strong>
                            </p>
                            <p>Tidak ada kata GAGAL selama kita berusaha untuk terus mencoba SUKSES</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        <a class="btn-scrollup" id="return-to-top" style="display: inline;"><i class="fa fa-angle-double-up"></i></a>
    </div> <!-- content -->
    </div>
    <footer>
        <div class="bg-secondary text-white">
            <div class="mx-auto p-4">
                <div class="text-center">
                    <p>Copyright © 2020 - {{ date('Y') }} YAYASAN PENDIDIKAN TAMAN BELAJAR. All rights reserved. 
                      <br>  Powered : <a class="text-white" href="https://deddybear.github.io/aboutme/">Deddy | Software House</a>
                    </p>
                    
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
