@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/list-artikel.css') }}">
@endsection

@section('title', 'List Artikel Yayasan Taman Belajar Islami')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-xl-9">
            <div class="slider">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Category: 
                            @if (url()->current() == url('/artikel/A1'))                                 
                                 {{ $category = "Artikel Sekolahan" }}
                            @elseif (url()->current() == url('/artikel/A2'))                                 
                                 {{ $category = "Artikel Siswa"}}
                            @elseif (url()->current() == url('/artikel/A3'))                    
                                 {{ $category = "Artikel Guru" }}
                            @elseif (url()->current() == url('/artikel/S1'))                    
                                 {{ $category = "Artikel Pengumuman PPDB" }}
                            @endif
                        </h2>
                        <p class="card-text">{{ $category }} Taman Belajar </p>
                     </div>
                </div>
                @foreach ($data as $item)
                <div class="list-berita my-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="container">
                                <div class="row">
                                    <div class="title-post mb-4">
                                        <div class="container">
                                            <div class="row">
                                                <div class="p-0 mr-3 publish-calendar">
                                                    <span class="publish-month">
                                                        {{ date_format($item->updated_at, "M") }}
                                                    </span>
                                                    <span class="publish-day">
                                                        {{ date_format($item->updated_at, "d") }}
                                                    </span>
                                                </div>

                                                <div class="col-9 p-0">
                                                    <h4>
                                                        <a class="text-sm" href="/artikel/{{ $item->id_kategori }}/{{ $item->slug }}">
                                                            {{ $item->judul_berita }}
                                                        </a>
                                                    </h4>
                                                    <span class="text-secondary">                                               
                                                        <div class="float-left mx-2">
                                                            <i class="fas fa-user-circle"></i>
                                                            {{ $item->nama }}    
                                                        </div>
                                                        <div class="float-left mx-2">
                                                            <i class="far fa-folder-open"></i>
                                                            {{ $category }}, {{ $item->type_berita }}
                                                        </div>                                                                                                   
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-post text-secondary">
                                        <p>
                                            {{ str_limit(strip_tags($item->isi_berita), 250) }}
                                            @if (strlen(strip_tags($item->isi_berita)) > 250)
                                                <a style="color: #0056b3;" href="/artikel/{{ $item->id_kategori }}/{{ $item->slug }}">Selanjutnya</a>
                                            @endif
                                        </p>
                                    </div>
                                </div>                       
                            </div>                          
                         </div>
                    </div>
                </div>
                @endforeach              
            </div>
            <div class="col-12">
                {{ $data->links("pagination::bootstrap-4") }}
            </div>
        </div>
        @include('layouts.sidebar')
    </div>
</div>
@endsection