@extends('layouts.dashboard-master')

@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/css/datatables.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('adminlte/js/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('adminlte/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/admin/ppdb-sd.js') }}"></script>

@endsection

@section('title', 'Informasi PPDB') {{-- tingkatan? --}}

@section('content')
<div class="content-wrapper">

    {{-- Content --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable ui-sortable-handle">
                    <div class="card mt-4">
                        <div class="card card-danger">
                            <div class="card-header text-white">
                                <h3 class="card-title ">Data Calon PPDB SD</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <label>Status Penerimaan Peserta Didik Baru</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="change_status" id="buka"
                                        value="1">
                                    <label class="form-check-label" for="buka">Dibuka</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="change_status" id="tutup"
                                        value="0">
                                    <label class="form-check-label" for="tutup">Ditutup</label>
                                </div>
                                <br>
                                <br>
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th class="text-sm">No.</th>
                                            <th class="text-sm">ID Pendaftaran</th>
                                            <th class="text-sm">Tahun Pendaftaran</th>
                                            <th class="text-sm">Status</th>
                                            <th class="text-sm">Nama Peserta</th>
                                            <th class="text-sm">Tempat, Tanggal Lahir</th>
                                            <th class="text-sm">Alamat Lengkap</th>
                                            <th class="text-sm">Nama Ayah</th>
                                            <th class="text-sm">Nama Ibu</th>
                                            <th class="text-sm">File Akte</th>
                                            <th class="text-sm">File KK</th>
                                            <th class="text-sm">File Foto</th>
                                            <th class="text-sm">File KIP</th>
                                            <th class="text-sm">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_data">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card card-secondary">
                            <div class="card-header text-white">
                                <h3 class="card-title">Postingan Berita Pengumaman PPDB-SD</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-12 my-3">
                                <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_form" href="#">
                                    <span class="fas fa-newspaper"></span>
                                    Edit Berita Pengumuman
                                </a>
                            </div>
                        </div>
                        <div id="pengumuman-ppdb-sd" class="col-12">
                            <div class="col-12" id="pengumuman-ppdb-sd">
                                <div class="content">
                                    <div class="card card-secondary">
                                        <div class="card-header text-white">
                                            View Pengumuman PPDB-SD
                                        </div>
                                        <div class="card-body">
                                            <h3 class="entry-title mt-3" id="judul"></h3>
                                            <footer class="entry-footer text-secondary" style="font-size: small;">
                                                <span class="posted" id="time">
                                                </span>
                                                <span class="mx-1 posted" id="author">
                                                </span>
                                            </footer>
                                            <p id="news"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    {{-- MODAL --}}
    <div class="modal" id="modal_form" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="max-width: 1000px !important">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Berita Pengumuman PPDB-SD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="form-horizontal" method="post" id="form">
                    @csrf
                    <div class="loading__proc" style='display: none;' oncontextmenu="return false"
                        onkeydown="return false;" onmousedown="return false;"></div>
                    <div class="form-body">
                        <span class="my-1" id="result"></span>
                        <div class="form-group">
                            <div class="col-md-8 my-4">
                                <label for="judul">Judul Pengumuman PPDB-SD</label>
                                <input class="form-control" type="text" name="judul_berita" id="judul" required>
                            </div>
                            <div class="col-md-12">
                                <textarea name="news" id="teks_artikel" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="ok">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
