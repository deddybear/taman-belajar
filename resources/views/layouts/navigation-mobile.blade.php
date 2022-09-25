<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Menu</h3>
    </div>
    <ul class="list-unstyled components article">
        <li>
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" style="height: 40px; width: 40px">
                Homepage
            </a>
        </li>
        <li>
            <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle article">Profile Sekolahan</a>
            <ul class="collapse list-unstyled" id="profile">
                <li>
                    <a class="article" href="/profile-sekolah/sd">Profile Sekolah SD</a>
                </li>
                <li>
                    <a class="article" href="/profile-sekolah/smp">Profile Sekolah SMP</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#akademi" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle article">Informasi Akademik</a>
            <ul class="collapse list-unstyled" id="akademi">
                <li>
                    <a href="#listSD" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">SD</a>
                    <ul class="collapse list-unstyled" id="listSD">
                        <a href="/form-page/ppdb/sd">Penerimaan Siswa Baru</a>
                        <a href="/ppdb/pengumuman/sd">Pengumuman PPDB-SD</a>
                        <a href="/info/struktural/sd">Pimpinan & Struktur</a>
                        <a href="/info/data-siswa/sd">Data Siswa SD Taman Belajar</a>
                    </ul>
                </li>
                <li>
                    <a href="#listSMP" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">SMP</a>
                    <ul class="collapse list-unstyled" id="listSMP">
                        <a href="/form-page/ppdb/smp">Penerimaan Siswa Baru</a>
                        <a href="/ppdb/pengumuman/smp">Pengumuman PPDB-SMP</a>
                        <a href="/info/struktural/smp">Pimpinan & Struktur</a>
                        <a href="/info/data-siswa/smp">Data Siswa SMP Taman Belajar</a>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="#gallery" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle article">Gallery</a>
            <ul class="collapse list-unstyled" id="gallery">
                <li>
                    <a href="#">Gallery Photo</a>
                </li>
                <li>
                    <a href="#">Gallery Video</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#berita" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle article">Berita</a>
            <ul class="collapse list-unstyled" id="berita">
                <li>
                    <a href="/artikel/A1">Artikel Sekolah</a>
                </li>
                <li>
                    <a href="/artikel/A2">Artikel Siswa</a>
                </li>
                <li>
                    <a href="/artikel/A3">Artikel Guru</a>
                </li>
            </ul>
        </li>
         <li>
             @if (request()->session()->has('username') && request()->session()->has('aktif') )
                <a class="article" href="{{ url('/panel-admin/dashboard') }}">Dashboard</a>
            @endif
         </li>
    </ul>
</nav>
<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
            </button>
        </div>
    </nav>
