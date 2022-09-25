
@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', 'Selamat Datang di Yayasan Taman Belajar Islami')

@section('content')

<div class="container mainPage">
    <div class="row">
        <div class="col-lg-12 col-xl-9">
            <div class="slider">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('images/carosel1.jpg')}}" width="800" height="600">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('images/carosel2.jpg')}}" width="800" height="600">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('images/carosel3.jpeg')}}" width="800" height="600">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <ol class="breadcrumb post-header">
                <li><i class="fas fa-sign-in-alt"></i> BERITA SEKOLAH</li>
            </ol>
            <div class="post">
                <div class="row">
                    <div class="col-md-6">
              
                        <div class="thumbnail no-border">
                            <img class="img-thumbnail" src="{{ $first_sekolahan->sampul_berita }}" alt=""
                                style="width: 378px; height: 250px; display: block">
                            <div class="caption">
                                <h4>
                                    <a href="/artikel/{{ $first_sekolahan->id_kategori }}/{{ $first_sekolahan->slug }}">{{ $first_sekolahan->judul_berita }}</a>
                                </h4>
                                <p>{{ date_format($first_sekolahan->updated_at, 'd M Y') }} | oleh {{ $first_sekolahan->nama }}</p>
                                <p style="text-align: justify">
                                    {{ str_limit(strip_tags($first_sekolahan->isi_berita ), 250) }}
                                    @if (strlen(strip_tags($first_sekolahan->isi_berita )) > 250)
                                        <a style="color: #0056b3;" href="/artikel/{{ $first_sekolahan->id_kategori }}/{{ $first_sekolahan->slug }}">Selanjutnya</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        @foreach ($berita_sekolahan as $item)                
                        <ul class="media-list main-list">
                            <li class="media">
                                <a href="" class="right-pull">
                                    <img class="img-fluid" src="{{ $item->sampul_berita }}"
                                        style="width: 150px; height: 6.250em;">
                                </a>
                                <div class="media-body">
                                    <h6>
                                        <a href="/artikel/{{ $item->id_kategori }}/{{ $item->slug }}">{{ $item->judul_berita }}</a>
                                    </h6>
                                    <p>{{ date_format($item->updated_at, "d M Y") }}</p>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>

            <ol class="breadcrumb post-header">
                <li><i class="fas fa-sign-in-alt"></i> BERITA SISWA</li>
            </ol>
            <div class="post">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Foreach -->
                        <div class="thumbnail no-border">
                            <img class="img-thumbnail" src="{{ $first_siswa->sampul_berita }}" alt=""
                                style="width: 378px; height: 250px; display: block">
                            <div class="caption">
                                <h4>
                                    <a href="/artikel/{{ $first_siswa->id_kategori }}/{{ $first_siswa->slug }}">{{ $first_siswa->judul_berita }}</a>
                                </h4>
                                <p>{{ date_format($first_siswa->updated_at, 'd M Y') }} | oleh {{ $first_siswa->nama }}</p>
                                <p style="text-align: justify">
                                    {{ str_limit(strip_tags($first_siswa->isi_berita ), 250) }}
                                    @if (strlen(strip_tags($first_siswa->isi_berita )) > 250)
                                        <a style="color: #0056b3;" href="/artikel/{{ $first_siswa->id_kategori }}/{{ $first_siswa->slug }}">Selanjutnya</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @foreach ($berita_siswa as $item)                
                        <ul class="media-list main-list">
                            <li class="media">
                                <a href="" class="right-pull">
                                    <img class="img-fluid" src="{{ $item->sampul_berita }}"
                                        style="width: 150px; height: 6.250em;">
                                </a>
                                <div class="media-body">
                                    <h6>
                                        <a href="/artikel/{{ $item->id_kategori }}/{{ $item->slug }}">{{ $item->judul_berita }}</a>
                                    </h6>
                                    <p>{{ date_format($item->updated_at, "d M Y") }}</p>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>

            <ol class="breadcrumb post-header">
                <li><i class="fas fa-sign-in-alt"></i> BERITA GURU</li>
            </ol>
            <div class="post">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Foreach -->
                        <div class="thumbnail no-border">
                            <img class="img-thumbnail" src="{{ $first_guru->sampul_berita }}" alt=""
                                style="width: 378px; height: 250px; display: block">
                            <div class="caption">
                                <h4>
                                    <a href="/artikel/{{ $first_guru->id_kategori }}/{{ $first_guru->slug }}">{{ $first_guru->judul_berita }}</a>
                                </h4>
                                <p>{{ date_format($first_guru->updated_at, 'd M Y') }} | oleh {{ $first_guru->nama }}</p>
                                <p style="text-align: justify">
                                    {{ str_limit(strip_tags($first_guru->isi_berita ), 250) }}
                                    @if (strlen(strip_tags($first_guru->isi_berita )) > 250)
                                        <a style="color: #0056b3;" href="/artikel/{{ $first_guru->id_kategori }}/{{ $first_guru->slug }}">Selanjutnya</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @foreach ($berita_guru as $item)                
                        <ul class="media-list main-list">
                            <li class="media">
                                <a href="" class="right-pull">
                                    <img class="img-fluid" src="{{ $item->sampul_berita }}"
                                        style="width: 150px; height: 6.250em;">
                                </a>
                                <div class="media-body">
                                    <h6>
                                        <a href="/artikel/{{ $item->id_kategori }}/{{ $item->slug }}">{{ $item->judul_berita }}</a>
                                    </h6>
                                    <p>{{ date_format($item->updated_at, "d M Y") }}</p>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.sidebar')
    </div>
</div>
@endsection
