@if ((url()->current() == url('profile-sekolah/sd')))
    @php
        $status = 'SD TAMAN BELAJAR';
    @endphp
@elseif ((url()->current() == url('profile-sekolah/smp')))
    @php
        $status = 'SMP TAMAN BELAJAR';
    @endphp
@endif


@extends('layouts.master')

@section('title', 'Profile | '.$status)

@section('content')
<div class="container">
    <ol class="breadcrumb post-header">
        <li><i class="fas fa-sign-in-alt"></i> PROFILE {{ $status }}</li>
    </ol>
    <div class="row">
        <div class="col-lg-12 col-xl-9">
            <div class="slider">
                <div class="content">
                    <p style="text-align: justify">{!! $data->isi_profile !!} </p>
                </div>
            </div>
        </div>
        @include('layouts.sidebar')
    </div>
</div>
@endsection
