{{--  Bila Pendaftaran PPDB Sukses --}}

@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="/css/sb-admin-2.min.css">
@endsection

@section('script')
    <script src="/js/sb-admin-2.min.js"></script>
@endsection

@section('title', 'Pendaftaran Calon Siswa Sukses')

@section('content')
    <div class="container">
        <div class="text-center my-4 mx-auto">
            <h1 class="text-gray-800 mb-5">Pendaftaran Berhasil ! </h1>
            <p class="text-black mb-0">ID Pendaftaran : {{ $id }} </p>
            <p class="text-black">Silahkan simpan ID Pendaftaran diatas dan <b>WAJIB</b> mendownload file Data Calon Peserta dibawah ini</p>
            <p class="col-12 mx-auto alert alert-danger">karena dipergunakan untuk validasi data calon peserta</p>
            <div class="container-fluid col-12 ">
                <div class="row ">
                    <div class="col-4 mx-auto">
                        <a href="{{ url('/') }}/ppdb/{{ $kelas }}/download-data/{{ $id }}" class="btn btn-primary"><i class="fas fa-download"></i> Download Data Calon Peserta</a>
                    </div>
                    <div class="col-4 mx-auto">
                        <a href="/" class="btn btn-secondary"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection