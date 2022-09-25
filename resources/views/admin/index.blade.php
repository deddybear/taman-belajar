@extends('layouts.dashboard-master')

@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/css/tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/css/Chart.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('adminlte/js/Chart.min.js') }}"></script>
<script src="{{ asset('js/admin/dashboard.js') }}"></script>
<script src="{{ asset('adminlte/js/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/js/tempusdominus-bootstrap-4.min.js') }}"></script>
@endsection

@section('title', 'Dashboard Admin')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-10">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger text-lg text-center">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    {{-- Content --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-7 connectedSortable ui-sortable">

                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Data Siswa</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Data PPBD 5 Tahun Terakhir ({{ date('Y') - 5 }} - {{ date('Y') }})</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="stackedBarChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </section>
                <section class="col-lg-5 connectedSortable ui-sortable">
                    {{-- card --}}
                    <div class="card bg-gradient-light">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="far fa-calendar-alt mx-2"></i>
                                Kalender
                            </h3>
                            <div class="card-tools mx-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning btn-sm mx-1 rounded-circle"
                                        data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm mx-1 rounded-circle"
                                        data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                        </div>
                    </div>
                    {{-- card-end --}}

                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-success">
                        <span class="info-box-icon"><i class="far fa-calendar-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Artikel Sekolah</span>
                            <span class="info-box-number">{{ $artikel_sekolah }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-danger">
                        <span class="info-box-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Artikel Guru</span>
                            <span class="info-box-number">{{ $artikel_guru }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-info">
                        <span class="info-box-icon"><i class="fas fa-child"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Artikel Siswa</span>
                            <span class="info-box-number">{{ $artikel_siswa }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </section>
            </div>
        </div>
    </section>

</div>
@endsection
