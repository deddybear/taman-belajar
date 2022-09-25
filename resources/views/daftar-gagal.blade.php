{{--  Bila Pendaftaran PPDB Sukses --}}

@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="/css/sb-admin-2.min.css">
@endsection

@section('script')
    <script src="/js/sb-admin-2.min.js"></script>
@endsection

@section('title', 'Pendaftaran Gagal !')

@section('content')
    <div class="container">
        <div class="alert-danger text-center my-4 p-4 mx-auto">
            <h1 class="text-gray-800 mb-5">Pendaftaran Gagal ! </h1>
            <p class="text-white-500 mb-1">Mohon Coba beberapa saat lagi</p>
            <a href="/" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
@endsection