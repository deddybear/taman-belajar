<nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('images/logo.png') }}" style="height: 40px; width: 40px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        
            <li class="nav-item dropdown">
                <a class="nav-link " href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile Sekolahan <i class="fas fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                {{-- <li><a class="dropdown-item" href="#">Profile Sekolah TK</a></li> --}}
                    <li><a class="dropdown-item" href="/profile-sekolah/sd">Profile Sekolah SD</a></li>
                    <li><a class="dropdown-item" href="/profile-sekolah/smp">Profile Sekolah SMP</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link " id="Akademik" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Informasi Akademik <i class="fas fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="Akademik">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle">SD</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/form-page/ppdb/sd">Pendaftaran Siswa Baru</a></li>
                            <li><a class="dropdown-item" href="/ppdb/pengumuman/sd">Pengumuman PPDB-SD</a></li>
                            <li><a class="dropdown-item" href="/info/struktural/sd">Pimpinan & Struktur</a></li>
                            <li><a class="dropdown-item" href="/info/data-siswa/sd">Data Siswa SD Taman Belajar</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle">SMP</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/form-page/ppdb/smp">Pendaftaran Siswa Baru</a></li>
                            <li><a class="dropdown-item" href="/ppdb/pengumuman/smp">Pengumuman PPDB-SMP</a></li>
                            <li><a class="dropdown-item" href="/info/struktural/smp">Pimpinan & Struktur</a></li>
                            <li><a class="dropdown-item" href="/info/data-siswa/smp">Data Siswa SMP Taman Belajar</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gallery <i class="fas fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="/gallery-photo">Gallery Photo</a></li>
                    <li><a class="dropdown-item" href="/gallery-video">Gallery Video</a></li>
                </ul>
            </li>     
            <li class="nav-item dropdown">
                <a class="nav-link " href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Berita <i class="fas fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="/artikel/A1">Artikel Sekolah</a></li>
                    <li><a class="dropdown-item" href="/artikel/A2">Artikel Siswa</a></li>
                    <li><a class="dropdown-item" href="/artikel/A3">Artikel Guru</a></li>
                </ul>
            </li>
            @if (request()->session()->has('username') && request()->session()->has('aktif') )
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/panel-admin/dashboard') }}">Dashboard</a>
            </li>
            @endif
        </ul>
    </div>
</nav>
