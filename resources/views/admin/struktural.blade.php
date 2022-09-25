@if ((url()->current() == url('panel-admin/struktural/sd')))
    @php
        $idSekolah = '5bf660ba-fd9a-4711-bd64-2fe79d8c91c5' ;
        $status = 'SD TAMAN BELAJAR';
    @endphp
@elseif ((url()->current() == url('panel-admin/struktural/smp')))
    @php
        $idSekolah = 'be104838-0902-438c-a0a7-d3fdc7dbc080';
        $status = 'SMP TAMAN BELAJAR';
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
<script >
    var idSekolah = "{{ $idSekolah }}";
    var slug = "{{ $slug }}";
</script>
<script src="{{ asset('js/admin/struktural.js') }}"></script>
@endsection

@section('title', 'Informasi Struktural') {{-- tingkatan? --}}

@section('content')
<div class="content-wrapper">
     
    {{-- Content --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable ui-sortable-handle">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h3 class="card-title ">Data Struktural Sekolah {{ $status }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="pesan_sistem my-2">
                                <span id="result"></span>
                            </div>
                            <div class="pull-right my-3" style="float: right">
                                <a id="tambahdata" href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#modal_form">
                                    <span class="fa fa-plus"></span> Tambah Data Struktural {{ $status }} 
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>NUPTK</th>
                                            <th>Jabatan</th>
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

                    <form class="form-horizontal" method="post" id="form">
                        @csrf
                        <div class="loading__proc" style='display: none;' oncontextmenu="return false"
                            onkeydown="return false;" onmousedown="return false;"></div>
                        <div class="form-body p-3">

                            <div class="form-group">
                                <label class="control-label col-md-5">Nama Pegawai</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        placeholder="Nama Pegawai" required>
                                </div>
                            </div>
                         
                            <div class="form-group">
                                <label class="control-label col-md-5">NUPTK</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="nuptk" id="nuptk"
                                        placeholder="NUPTK Pegawai" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5">Jabatan</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="jabatan" id="jabatan"
                                    placeholder="Jabatan Pegawai" required>
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

    </section>
</div>
@endsection