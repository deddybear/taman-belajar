@if ((url()->current() == url('panel-admin/profile-sd')))
    @php
        $id = '501aa20b-a7d1-4cbe-aae8-7c5da074aad9' ;
        $status = 'SD';
    @endphp
@elseif ((url()->current() == url('panel-admin/profile-smp')))
    @php
        $id = 'ac8d9067-698c-4e35-9e72-2bae50216b36';
        $status = 'SMP';
    @endphp
@endif


@extends('layouts.dashboard-master')

@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/css/summernote-bs4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/css/datatables.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('adminlte/js/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
    var idProfile = "{{ $id }}";
</script>
<script src="{{ asset('js/admin/profile-sekolah.js') }}"></script>
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
                                <h3 class="card-title">Profile Sekolah {{ $status }}</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="pesan_sistem my-2">
                                <span id="result"></span>
                            </div>
                            <div class="pull-right my-3">
                                <a id="editdata" href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#modal_form">
                                    <span class="fa fa-plus"></span> Edit Profile Sekolah {{ $status }} 
                                </a>
                            </div>
                            <div class="card">
                                <div class="card-body" id="show_data">
                                </div>
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

                    <div class="modal-body">
                        <span id="result"></span>
                        <form class="form-horizontal" method="post" id="form">

                            <div class="form-body p-3">
                                <div class="pesan_sistem my-2">
                                    <span id="result"></span>
                                </div>                              

                                {{-- form-upload --}}
                                <div class="form-group">
                                    <label class="control-label col-md-5">Profile Sekolah {{ $status }}</label>
                                    <div class="col-md-12">
                                        <textarea name="textprofile" id="teks_profile"></textarea>
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