@if (url()->current() == url('/info/struktural/sd'))
    @php
        $status = 'SD TAMAN BELAJAR';
    @endphp
@elseif (url()->current() == url('/info/struktural/smp'))
    @php
        $status = 'SMP TAMAN BELAJAR';
    @endphp
@endif


@extends('layouts.master')

@section('title', 'Struktural | ' . $status)

@section('content')
<div class="container">
    <ol class="breadcrumb post-header">
        <li><i class="fas fa-sign-in-alt"></i> PIMPINAN & STRUKTURAL {{ $status }}</li>
    </ol>
    <div class="row">
        <div class="col-lg-12 col-xl-9">
            <div class="slider">
                <div class="content">
                    <h3 class="entry-title">Pimpinan & Struktural {{ $status }} </h3>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nip</th>
                            <th scope="col">Jabatan</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)                                
                            <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $item->nama }}</td>
                              <td>{{ $item->nuptk }}</td>
                              <td>{{ $item->jabatan }}</td>
                            </tr>
                            @endforeach  
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        @include('layouts.sidebar')
    </div>
</div>
@endsection
