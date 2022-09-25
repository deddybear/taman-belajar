@extends('layouts.dashboard-master')

@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/css/tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/css/datatables.min.css') }}">
@endsection

@section('script')

<script src="{{ asset('adminlte/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('adminlte/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/admin/gallery-foto.js') }}"></script>
@endsection

@section('title', 'Dashboard | Gallery Foto')

@section('content')
<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable ui-sortable-handle">
                    <div class="card mt-4">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Gallery Foto</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="pesan_sistem my-2">
                                <span id="result"></span>
                            </div>
                            <div class="pull-right my-3" style="float: right">
                                <a id="tambahdata" href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#modal_form">
                                    <span class="fa fa-plus"></span> Upload Foto
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Post by</th>
                                            <th>Judul</th>
                                            <th>Keterangan</th>
                                            <th>Gambar Foto</th>
                                            <th>Waktu Upload</th>
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
            <div class="modal-dialog" role="document" style="max-width: 500px !important">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <span id="result"></span>
                        <form class="form-horizontal" method="post" id="form" enctype="multipart/form-data">
                            
                            <div class="form-body p-3">

                                {{-- form-judul --}}
                                <div class="form-group">
                                    <label for="nomerpaslon" class="control-label col-md-5">Judul</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="judul" id="judulfoto"
                                            placeholder="Judul Foto" required>
                                    </div>
                                </div>
                                {{-- </div> --}}

                                {{-- form-keterangan --}}
                                <div class="form-group">
                                    <label for="nomerpaslon" class="control-label col-md-5">Keterangan</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="keterangan" id="keterangan"
                                            placeholder="Keterangan Foto" required>
                                    </div>
                                </div>
                                {{-- </div> --}}

                                {{-- form-upload --}}
                                <div class="form-group">
                                    <label for="nomerpaslon" class="control-label col-md-5">Upload Foto</label>
                                    <div class="col-md-12">
                                        <input type="file" class="form-control" name="image" id="image"
                                            placeholder="Upload Foto" required>
                                    </div>
                                </div>
                                {{-- </div> --}}
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

    </section>
</div>
@endsection
