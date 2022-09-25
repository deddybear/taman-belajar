@extends('layouts.master')

@section('title', 'Gallery Video | Nama Yayasan')

@section('content')
    <div class="container">
        <ol class="breadcrumb post-header">
            <li><i class="fas fa-film"></i>   GALLERY VIDEO</li>
        </ol>
        <div class="row">
            @foreach ($data as $item)    
            <div class="col-lg-12 col-xl-4 my-2">
                <div class="embed-responsive embed-responsive-16by9">
                    {{!! $item->link !!}}
                    {{-- <iframe class="embed-responsive-item" src="{{ $item->link }}" allowfullscreen></iframe> --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

