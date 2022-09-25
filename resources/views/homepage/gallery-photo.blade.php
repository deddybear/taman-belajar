@extends('layouts.master')

@section('title', 'Gallery Photo | Nama Yayasan')

@section('content')
<div class="container">
    <ol class="breadcrumb post-header">
        <li><i class="fas fa-camera"></i>   GALLERY PHOTO</li>
    </ol>
    <div class="row">
       @foreach ($data as $item)
           
       <div class="col-lg-12 col-xl-4">
           <div class="thumbnail">
               <img style="cursor: pointer; width: 100%; height: 250px;" onclick="preview(4)"
                   src="{{ asset('images/gallery-photo/'.$item->link) }}" alt="">
               <div class="caption">
                   <h4>{{ $item->judul }}</h4>
                   <p>{{ $item->keterangan }}</p>
               </div>
           </div>
       </div>

       @endforeach
    </div>

</div>
@endsection
