@extends('layouts.dashboard-master')

@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/css/datatables.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('adminlte/js/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('adminlte/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/admin/edit-account.js') }}"></script>
@endsection

@section('title', 'Dashboard | Edit Account')

@section('content')
<div class="content-wrapper">

    <section class="content">
        <div class="container-fuild">
            <div class="row">
                <section class="col-lg-12 connectedSortable ui-sortable-handle">
                    <div class="card mt-4">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit Account</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-warning text-sm text-center">
                                    <p>Mohon untuk diperbarui data akun anda</p>
                                </div>
                            <div class="pesan_sistem my-2">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success text-sm text-center">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger text-sm">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                @if ($errors->any())
                                <div class="alert alert-danger text-sm text-center">
                                    <ul style="padding: 0 !important">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <form action="{{ url('/admin/edit-account') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" class="form-control" name="username"
                                        placeholder="{{ request()->session()->get('username') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" class="form-control" name="nama"
                                        placeholder="{{ request()->session()->get('nama') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="old_password">Password Lama</label>
                                    <input type="password" id="old_password" class="form-control" name="oldpassword"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="new_password">Password Baru</label>
                                    <input type="password" id="new_password" class="form-control" name="newpassword"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="confrimation">Konfrimasi Password</label>
                                    <input type="password" id="confrimation" class="form-control" name="confrimation"
                                        required>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
@endsection
