@if (url()->current() == url('/info/data-siswa/sd'))
    @php
        $category = "SD";
    @endphp
@elseif (url()->current() == url('/info/data-siswa/smp'))
    @php
        $category = "SMP";
    @endphp
@endif


@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/css/datatables.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('adminlte/js/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#dataTable').DataTable();
        });
    </script>
@endsection

@section('title', 'Data Siswa '.$category.' Taman Belajar')

@section('content')
<div class="container">
    <ol class="breadcrumb post-header">
        <li><i class="fas fa-sign-in-alt"></i> DATA SISWA {{ $category }} TAMAN BELAJAR</li>
    </ol>
    <div class="row">
        <div class="col-lg-12 col-xl-9">
            <div class="slider">
                <div class="content">
                    <h3 class="entry-title mt-3"> List Data Siswa {{ $category }} Taman Belajar</h3>
                    <div class="content">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Nam Siswa</th>
                                        <th>Kelas</th>
                                        <th>NIS</th>
                                        <th>NISN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->kelas }}</td>
                                        <td>{{ $item->nis }}</td>
                                        <td>{{ $item->nisn }}</td>
                                    </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.sidebar')
    </div>
</div>
@endsection
