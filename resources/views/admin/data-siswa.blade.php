@if ((url()->current() == url('panel-admin/data-siswa-sd')))
    @php
        $id = '5bf660ba-fd9a-4711-bd64-2fe79d8c91c5' ;
        $status = 'SD';
    @endphp
@elseif ((url()->current() == url('panel-admin/data-siswa-smp')))
    @php
        $id = 'be104838-0902-438c-a0a7-d3fdc7dbc080';
        $status = 'SMP';
    @endphp
@endif



@extends('layouts.dashboard-master')

@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/css/datatables.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('adminlte/js/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/datatables.min.js') }}"></script>
    <script>
        var kelasId = "{{ $id }}";
    </script>
    <script src="{{ asset('js/admin/data-siswa.js') }}"></script>
@endsection

@section('title', 'Dashboard | Data Siswa '. $status)
    

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-lg-12 connectedSortable ui-sortable-handle">
                        <div class="card mt-4">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Data Siswa {{ $status }}</h3>
                                </div>
                            </div>
                            <div class="card-body">
                               
                                <div class="pull-right my-3" style="float: right">
                                    <a id="tambahdata" href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                        data-target="#modal_form">
                                        <span class="fa fa-plus"></span> Tambah Data Siswa {{ $status }} 
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>NIS</th>
                                                <th>NISN</th>
                                                <th>Create at</th>
                                                <th>Update at</th>
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
                        <div class="pesan_sistem my-2">
                            <span id="result"></span>
                        </div>
                        <div class="modal-body">
                            <span id="result"></span>
                            <form class="form-horizontal" method="post" id="form">
                                <div class="form-body p-3">
                                    <div class="pesan_sistem my-2">
                                        <span id="result"></span>
                                    </div>
                                    {{-- form-judul --}}
                                    <div class="form-group">
                                        <label class="control-label col-md-5">Nama Siswa</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="nama" id="nama"
                                                placeholder="Nama Siswa" required>
                                        </div>
                                    </div>
                                    {{-- </div> --}}

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Kelas</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="kelas" id="kelas"
                                                placeholder="Kelas Siswa" required>
                                        </div>
    
                                    {{-- NIS --}}
                                    <div class="form-group">
                                        <label class="control-label col-md-5">NIS</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="nis" id="nis"
                                                placeholder="NIS Siswa" required>
                                        </div>
                                    </div>
                                    {{-- </div> --}}
    

                                    {{-- NISN --}}
                                    <div class="form-group">
                                        <label class="control-label col-md-5">NISN</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="nisn" id="nisn"
                                                placeholder="NISN Siswa" required>
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
