@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show-artikel.css') }}">
    <style>
        .note-handle {
            position: relative;
          }
          .note-editable {
            z-index: 10;
            position: relative;
          }
          .note-codable {
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            position: absolute;
            z-index: 100;
          }
          .table-summernote td, .table-summernote th {
            padding: 5px !important;
            line-height: 1.42857143;
          }
    
          .table {
            width: unset !important;
            max-width: unset !important;
          }
          .table-bordered {
                border: 2px solid #dee2e6;
         }
    </style>
@endsection

@section('title', $data->judul_berita)

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-lg-12 col-xl-9">
            <div class="slider">
                <div class="content">
                    <h3 class="entry-title mt-3">{{ $data->judul_berita }}</h3>
                    <footer class="entry-footer text-secondary" style="font-size: small;">
                        <span class="posted">
                            <i class="far fa-clock"></i>
                            {{ date_format($data->updated_at, "d M Y") }}
                        </span>
                        <span class="posted">
                            <i class="fas fa-user"></i>
                            Author : {{ $data->nama }}
                        </span>
                    </footer>
                    <p>
                        {!! $data->isi_berita !!}
                    </p>
                </div>
                @if (url()->current() == url('/ppdb/pengumuman/sd') || url()->current() == url('/ppdb/pengumuman/smp'))
                @else 
                <div class="previous my-3 float-right">
                    <a class="btn btn-primary" href="/artikel/{{ $data->id_kategori }}" >Kembali ke list artikel {{ $data->nama_kategori }}</a>
                </div>
                @endif
            </div>
        </div>
        @include('layouts.sidebar')
    </div>
</div>
@endsection
