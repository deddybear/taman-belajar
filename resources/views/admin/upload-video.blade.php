@extends('layouts.dashboard-master')

@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/css/datatables.min.css') }}">


@endsection

@section('script')
<script src="{{ asset('adminlte/js/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('adminlte/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/admin/gallery-video.js') }}"></script>
@endsection

@section('title', 'Upload Video')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable ui-selectable-handle">
                    <div class="card mt-4">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Embed Video</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <span id="result"></span>
                            <div class="pull-right my-3" style="float: right">
                                <a id="tambahdata" href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#modal_form">
                                    <span class="fa fa-plus"></span> Tambah Link Video
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Judul</th>
                                            <th>Keterangan</th>
                                            <th>Link</th>
                                            <th>Dibuat pada</th>
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

                        <form class="form-horizontal" method="post" id="form"
                            enctype="multipart/form-data">

                            <div class="form-body p-3">

                                {{-- form-judul --}}
                                <div class="form-group">
                                    <label for="nomerpaslon" class="control-label col-md-5">Judul</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="judul" id="judul"
                                            placeholder="Judul Video" required>
                                    </div>
                                </div>
                                {{-- </div> --}}

                                {{-- form-keterangan --}}
                                <div class="form-group">
                                    <label for="nomerpaslon" class="control-label col-md-5">Keterangan</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="keterangan" id="keterangan"
                                            placeholder="Keterangan Video" required>
                                    </div>
                                </div>
                                {{-- </div> --}}

                                {{-- form-upload --}}
                                <div class="form-group mb-2">
                                    <label for="nomerpaslon" class="control-label col-md-5">Link Embed Video</label>
                                    <div class="col-md-12">
                                        <textarea type="text" class="form-control" name="link" id="link" rows="5"></textarea>
                                        <small class="bg-warning p-1">
                                            Cara untuk mendapatkan link embed youtube <a href="" data-toggle="modal"
                                                data-target="#modal_tutor">disini</a>
                                        </small>
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

        {{-- Modal Tutor --}}
        <div class="modal" id="modal_tutor" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="max-width: 1000px !important">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cara mendapatkan link embed</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="tutor-content">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <p>Pertama pergi ke youtube lalu pilih video yang akan didapatkan linknya jika sudah
                                        klik Share yang sudah dlingkari</p>
                                        <img class="col-md-12" src="/images/tutor-img-1.png">
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <p>Kedua tampilannya akan seperti ini lalu pilih embed yang sudah dilingkari</p>
                                    <img class="col-md-12" src="/images/tutor-img-2.png">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <p>ketiga maka akan muncul window baru di halaman web lalu klik copy, setelah itu pastekan ke form embed link video </p>
                                    <img class="col-md-12" src="/images/tutor-img-3.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection
