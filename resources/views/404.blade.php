@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="/css/sb-admin-2.min.css">
@endsection

@section('script')
    <script src="/js/sb-admin-2.min.js"></script>
@endsection

@section('title', '404 Content Not Found')

@section('content')
    <div class="container">
        <div class="text-center my-auto">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">Silahkan laporkan bagian Administrator</p>
          </div>
    </div>
@endsection