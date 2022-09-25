@extends('layouts.dashboard-master')

@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/css/summernote-bs4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/css/datatables.min.css') }}">


@endsection

@section('script')
<script src="{{ asset('adminlte/js/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('adminlte/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/admin/berita.js') }}"></script>
@endsection

@section('title', 'Portal Berita')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable ui-selectable-handle">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h3 class="card-title">Portal Berita</h3>
                        </div>
                        <div class="card-body">
                            <span id="result"></span>
                            <div class="pull-right my-3" style="float: right">
                                <a id="tambahdata" href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#modal_form">
                                    <span class="fa fa-plus"></span> Tambah Berita
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Berita</th>
                                            <th>Artikel</th>
                                            <th>Kategori</th>
                                            <th>Waktu Pembuatan</th>
                                            <th>Waktu Update</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_data">                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        {{-- MODAL --}}
        <div class="modal" id="modal_form" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="max-width: 1000px !important">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form class="form-horizontal" method="post" id="form">
                
                        <section class="content m-2">                           
                            <div class="container-fuild">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="nomerpaslon" class="control-label col-md-5">Nama
                                                Berita</label>
                                            <div class="col-md-12">
                                                <input type="hidden" name="idBerita" id="idBerita">
                                                <input type="text" class="form-control" name="namaberita"
                                                    id="namaberita" placeholder="Nama Berita" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nomerpaslon" class="control-label col-md-5">Kategori</label>
                                            <div class="col-md-12">
                                                <select class="form-control" name="kategori" id="kategori" required>
                                                    <option selected="selected">Silahkan Pilih</option>
                                                    <option value="A1">Artikel Sekolahan</option>
                                                    <option value="A2">Artikel Siswa</option>
                                                    <option value="A3">Artikel Guru</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group siswa">
                                            <label class="control-label col-md-5 for"></label>
                                            <div class="col-md-12">
                                                <select class="form-control" name="type" id="type">
                                                    <option value="sd">SD</option>
                                                    <option value="smp">SMP</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="teks_artikel" class="control-label col-md-5">Isi Artikel</label>
                                            <div class="col-md-12">
                                                <textarea name="news" id="teks_artikel"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="ok">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                    </form>
    </section>
</div>
</div>
</div>

</section>
</div>
@endsection
