@php
$status = 'SD TAMAN PELAJAR';
@endphp
{{-- REVISI --}}
@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="/css/sweetalert2.min.css">
@endsection

@section('script')
<script src="/js/sweetalert2.all.min.js"></script>
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/js/ppdb.js"></script>
@endsection

@section('title', 'Form PPDB | '. $status)

@section('content')

<div class="container">
    <ol class="breadcrumb post-header">
        <li><i class="fas fa-sign-in-alt"></i> FORM PPDB {{ $status }}</li>
    </ol>
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="slider">
                <div class="content">
                    <h3 class="empty-title">Formulir Pendaftaran {{ $status }}</h3>
                    <div class="form-formulir my-3">
                        <form id="form" action="/daftar/ppdb/sd" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- Form Data Calon Peserta Didik --}}
                            <div class="my-3 px-3 data-siswa">
                                <div class="card">
                                    <div class="card-header">
                                        A. Data Calon Peserta Didik
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            <div class="form-group">
                                                <label for="fullname">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="fullname" name="nama_siswa"
                                                    placeholder="Nama Lengkap" required>
                                                @if ($errors->has('nama_siswa'))
                                                    <span class="text-danger">{{ $errors->first('nama_siswa') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="kelamin"
                                                        id="exampleRadios1" value="Pria" required>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Pria
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="kelamin"
                                                        id="exampleRadios2" value="Wanita" required>
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Wanita
                                                    </label>
                                                </div>
                                                @if ($errors->has('kelamin'))
                                                    <span class="text-danger">{{ $errors->first('kelamin') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat, Tanggal Lahir</label>
                                                <div class="form-row px-1">
                                                    <div class="form-group mx-0">
                                                        <input type="text" class="form-control" id="ttl"
                                                            name="tempat_lahir_siswa" placeholder="Tempat Lahir"
                                                            required>
                                                    </div>
                                                    <div class="form-group mx-2">
                                                        <div class="input-group date" data-provide="datepicker"
                                                            data-date-format="dd/mm/yyyy">
                                                            <input type="text" name="tanggal_lahir_siswa"
                                                                class="form-control datepicker" required>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($errors->has('tempat_lahir_siswa'))
                                                    <span class="text-danger">{{ $errors->first('tempat_lahir_siswa') }}</span>
                                                @endif
                                                @if ($errors->has('tanggal_lahir_siswa'))
                                                    <span class="text-danger">{{ $errors->first('tanggal_lahir_siswa') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="religion">Agama</label>
                                                <select class="form-control" name="agama_siswa" id="religion" required>
                                                    <option selected> Silahkan Dipilih </option>
                                                    <option value="islam">Islam</option>
                                                    <option value="prostestan">Prostestan</option>
                                                    <option value="katolik">Katolik</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="buddha">Buddha</option>
                                                    <option value="khonghucu">Khonghucu</option>
                                                </select>
                                                @if ($errors->has('agama_siswa'))
                                                    <span class="text-danger">{{ $errors->first('agama_siswa') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="saudara-ke">Anak Nomer Ke-</label>
                                                <input type="number" min="1" name="anak_ke" class="form-control"
                                                    id="anak-ke" placeholder="Anak ke-" required>
                                                @if ($errors->has('anak_ke'))
                                                    <span class="text-danger">{{ $errors->first('anak_ke') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah-saudara">Jumlah Saudara</label>
                                                <input type="number" min="1" name="jumlah_saudara" class="form-control"
                                                    id="jumlah-saudara" placeholder="Jumlah Saudara" required>
                                                @if ($errors->has('jumlah_saudara'))
                                                    <span class="text-danger">{{ $errors->first('jumlah_saudara') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat Lengkap</label>
                                                <input type="text" class="form-control" name="alamat_lengkap"
                                                    id="alamat" placeholder="Alamat Lengkap" required>
                                                @if ($errors->has('alamat_lengkap'))
                                                    <span class="text-danger">{{ $errors->first('alamat_lengkap') }}</span>
                                                @endif
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- End Form Data Calon Peserta Didik --}}

                            {{-- Form Data Orang Tua --}}
                            <div class="my-3 px-3 data-ortu">
                                <div class="card my-3">
                                <div class="card-header">
                                  B. Keterangan Orang Tua Kandung
                                </div>
                                <div class="card-body">                                 
                                  <p class="card-text">
                                     <label>Nama Lengkap</label>
                                     <div class="px-3 nama-ortu">
                                        <div class="form-group">
                                            <label for="nama-ayah">Nama Ayah</label>
                                            <input type="text" class="form-control" name="nama_ayah"
                                                id="nama-ayah" placeholder="Nama Ayah" required>
                                            @if ($errors->has('nama_ayah'))
                                                <span class="text-danger">{{ $errors->first('nama_ayah') }}</span>
                                            @endif
                                         </div>
                                         <div class="form-group">
                                            <label for="nama-ibu">Nama Ibu</label>
                                            <input type="text" class="form-control" name="nama_ibu" id="nama-ibu"
                                                placeholder="Nama Ibu" required>
                                            @if ($errors->has('nama_ibu'))
                                                <span class="text-danger">{{ $errors->first('nama_ibu') }}</span>
                                            @endif
                                        </div>
                                     </div>
                                     <label>Tempat, Tanggal Lahir</label>
                                     <div class="px-3 tahun-lahir">
                                         <div class="form-group">
                                             <label>Ayah</label>
                                             <div class="form-row px-1">
                                                <div class="form-group mx-0">
                                                    <input type="text" class="form-control"
                                                        name="tempat_lahir_ayah" id="ttl"
                                                        placeholder="Tempat Lahir" required>
                                                </div>
                                                <div class="form-group mx-2">
                                                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                                        <input type="text" class="form-control"
                                                            name="tanggal_lahir_ayah" required>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text"><i
                                                                    class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($errors->has('tempat_lahir_ayah'))
                                                    <span class="text-danger">{{ $errors->first('tempat_lahir_ayah') }}</span>
                                                @endif
                                                @if ($errors->has('tanggal_lahir_ayah'))
                                                    <span class="text-danger">{{ $errors->first('tanggal_lahir_ayah') }}</span>
                                                @endif
                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <label>Ibu</label>
                                            <div class="form-row px-1">
                                                <div class="form-group mx-0">
                                                    <input type="text" class="form-control" name="tempat_lahir_ibu" id="ttl"
                                                        placeholder="Tempat Lahir" required>
                                                </div>
                                                <div class="form-group mx-2">
                                                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                                        <input type="text" class="form-control" name="tanggal_lahir_ibu"
                                                            required>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @if ($errors->has('tempat_lahir_ibu'))
                                                <span class="text-danger">{{ $errors->first('tempat_lahir_ibu') }}</span>
                                            @endif
                                            @if ($errors->has('tanggal_lahir_ibu'))
                                                <span class="text-danger">{{ $errors->first('tanggal_lahir_ibu') }}</span>
                                            @endif
                                            </div>
                                         </div>
                                     </div>
                                     <label>Pekerjaan</label>
                                     <div class="px-3 pekerjaan">
                                        <div class="form-group">
                                            <label for="pekerjaan-ayah">Ayah</label>
                                            <input type="text" class="form-control" name="pekerjaan_ayah"
                                                id="pekerjaan-ayah" placeholder="Pekerjaan Ayah" required>
                                            @if ($errors->has('pekerjaan_ayah'))
                                                <span class="text-danger">{{ $errors->first('pekerjaan_ayah') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="pekerjaan-ibu">Ibu</label>
                                            <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan-ibu"
                                                placeholder="Pekerjaan Ibu" required>
                                            @if ($errors->has('pekerjaan_ibu'))
                                                <span class="text-danger">{{ $errors->first('pekerjaan_ibu') }}</span>
                                            @endif
                                        </div>
                                     </div>
                                     <label>Pendidikan Terakhir</label>
                                     <div class="px-3 pendidikan">
                                        <div class="form-group">
                                            <label for="pendidikan-ayah">Ayah</label>
                                            <input type="text" class="form-control" name="pendidikan_ayah"
                                                id="pendidikan-ayah" placeholder="Pendidikan Terakhir" required>
                                            @if ($errors->has('pendidikan_ayah'))
                                                <span class="text-danger">{{ $errors->first('pendidikan_ayah') }}</span>
                                            @endif
                                         </div>
                                         <div class="form-group">
                                            <label for="pendidikan-ayah">Ibu</label>
                                            <input type="text" class="form-control" name="pendidikan_ibu"
                                                id="pendidikan-ibu" placeholder="Pendidikan Terakhir" required>
                                            @if ($errors->has('pendidikan_ibu'))
                                                <span class="text-danger">{{ $errors->first('pendidikan_ibu') }}</span>
                                            @endif
                                         </div>
                                     </div>                                             
                                     <label>Agama</label>
                                     <div class="px-3 agama">
                                        <label>Ayah</label>
                                        <div class="form-group">
                                            <select class="form-control" name="agama_ayah" id="religion" required>
                                                <option selected> Silahkan Dipilih </option>
                                                <option value="islam">Islam</option>
                                                <option value="prostestan">Prostestan</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Buddha</option>
                                                <option value="khonghucu">Khonghucu</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                            @if ($errors->has('agama_ayah'))
                                                <span class="text-danger">{{ $errors->first('agama_ayah') }}</span>
                                            @endif
                                        </div>                                               
                                        <label>Ibu</label>
                                        <div class="form-group">
                                            <select class="form-control" name="agama_ibu" id="religion" required>
                                                <option selected> Silahkan Dipilih </option>
                                                <option value="islam">Islam</option>
                                                <option value="prostestan">Prostestan</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Buddha</option>
                                                <option value="khonghucu">Khonghucu</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                            @if ($errors->has('agama_ibu'))
                                                <span class="text-danger">{{ $errors->first('agama_ibu') }}</span>
                                            @endif
                                        </div>
                                     </div>
                                     <label>Nomer Telp / Hp</label>
                                     <div class="px-3 no-contact">
                                        <div class="form-group">
                                            <label for="nomer-ayah">Ayah</label>
                                            <input type="number" class="form-control" name="nomer_ayah" min="0"
                                                id="nomer-ayah" placeholder="Nomer yang bisa dihubungi"
                                                required>
                                            @if ($errors->has('nomer_ayah'))
                                                <span class="text-danger">{{ $errors->first('nomer_ayah') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="nomer-ibu">Ibu</label>
                                            <input type="number" class="form-control" name="nomer_ibu" id="nomer-ibu" min="0"
                                                placeholder="Nomer yang bisa dihubungi" required>
                                            @if ($errors->has('nomer_ibu'))
                                                <span class="text-danger">{{ $errors->first('nomer_ibu') }}</span>
                                            @endif
                                        </div>
                                     </div>
                                     <div class="form-group my-1">
                                        <label for="alamat">Alamat Tempat Tinggal</label>
                                        <input type="text" class="form-control" name="alamat_tempat_ortu"
                                        id="alamat" placeholder="Alamat Lengkap" required>
                                        @if ($errors->has('alamat_tempat_ortu'))
                                            <span class="text-danger">{{ $errors->first('alamat_tempat_ortu') }}</span>
                                        @endif
                                     </div>
                                     <label>Penghasilan rata-rata perbulan (Rp)</label>
                                     <div class="px-3 penghasilan">
                                        <div class="form-group row my-2">
                                            <label class="col-lg-12 col-form-label">Ayah : </label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penghasilan_ayah" id="penghasilan-ayah1" value=" 0 - 1jt" required>
                                                <label class="form-check-label" for="penghasilan-ayah1">0 - 1jt</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penghasilan_ayah" id="penghasilan-ayah2" value="1jt - 2jt" required>
                                                <label class="form-check-label" for="penghasilan-ayah2">1jt - 2jt</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penghasilan_ayah" id="penghasilan-ayah3" value="2jt - 5jt" required>
                                                <label class="form-check-label" for="penghasilan-ayah3">2jt - 5jt</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penghasilan_ayah" id="penghasilan-ayah4" value="5jt - 20jt" required>
                                                <label class="form-check-label" for="penghasilan-ayah4">5jt - 20jt</label>
                                              </div>
                                          @if ($errors->has('penghasilan_ayah'))
                                            <span class="text-danger">{{ $errors->first('penghasilan_ayah') }}</span>
                                          @endif
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-12 col-form-label">Ibu : </label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penghasilan_ibu" id="penghasilan-ibu1" value="0 - 1jt" required>
                                                <label class="form-check-label" for="penhasilan-ibu1">0 - 1jt</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penghasilan_ibu" id="penghasilan-ibu2" value="1jt - 2jt" required>
                                                <label class="form-check-label" for="penghasilan-ibu2">1jt - 2jt</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penghasilan_ibu" id="penghasilan-ibu3" value="2jt - 5jt" required>
                                                <label class="form-check-label" for="penghasilan-ibu3">2jt - 5jt</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penghasilan_ibu" id="penghasilan-ibu4" value="5jt - 20jt" required>
                                                <label class="form-check-label" for="penghasilan-ibu4">5jt - 20jt</label>
                                              </div>
                                        @if ($errors->has('penghasilan_ibu'))
                                            <span class="text-danger">{{ $errors->first('penghasilan_ibu') }}</span>
                                        @endif
                                        </div>
                                     </div>
                                     <label>Keterangan</label>
                                     <div class="px-3 keterangan">
                                         <div class="form-group row">
                                            <label class="col-lg-12 col-form-label">Ayah : </label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="keterangan_ayah" id="inlineRadio1" value="Masih Hidup" required>
                                                <label class="form-check-label" for="inlineRadio1">Masih Hidup</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="keterangan_ayah" id="inlineRadio2" value="Wafat" required>
                                                <label class="form-check-label" for="inlineRadio2">Sudah Wafat</label>
                                              </div>
                                            @if ($errors->has('keterangan_ayah'))
                                              <span class="text-danger">{{ $errors->first('keterangan_ayah') }}</span>
                                            @endif
                                         </div>
                                         <div class="form-group row">
                                            <label class="col-lg-12 col-form-label">Ibu : </label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="keterangan_ibu" id="inlineRadio1" value="Masih Hidup" required>
                                                <label class="form-check-label" for="inlineRadio1">Masih Hidup</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="keterangan_ibu" id="inlineRadio2" value="Wafat" required>
                                                <label class="form-check-label" for="inlineRadio2">Sudah Wafat</label>
                                              </div>
                                            @if ($errors->has('keterangan_ibu'))
                                              <span class="text-danger">{{ $errors->first('keterangan_ibu') }}</span>
                                            @endif
                                         </div>
                                     </div>                                             
                                    </p>
                                </div>
                            </div>
                        </div>
                             {{-- End Form Data Orang Tua --}}

                            {{-- Form Data WALI MURID --}}
                            <div class="my-3 px-3 data-wali">
                                <div class="card">
                                    <div class="card-header">
                                      C. Data Orang Wali
                                    </div>
                                    <div class="card-body">
                                      <p class="card-text">
                                        <div class="form-group">
                                            <label for="nama-wali">Nama Wali</label>
                                            <input type="text" class="form-control" name="nama_wali" id="nama-wali"
                                                placeholder="Nama Wali">
                                            @if ($errors->has('nama_wali'))
                                                <span class="text-danger">{{ $errors->first('nama_wali') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat, Tanggal Lahir</label>
                                            <div class="form-row px-1">
                                                <div class="form-group mx-1 ">
                                                    <input type="text" class="form-control" name="tempat_lahir_wali" id="ttl"
                                                        placeholder="Tempat Lahir">
                                                </div>
                                                <div class="form-group mx-1 ">
                                                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                                        <input type="text" class="form-control" name="tanggal_lahir_wali">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($errors->has('tempat_lahir_wali'))
                                                <span class="text-danger">{{ $errors->first('tempat_lahir_wali') }}</span>
                                            @endif
                                            @if ($errors->has('tanggal_lahir_wali'))
                                                <span class="text-danger">{{ $errors->first('tanggal_lahir_wali') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="pendidikan-wali">Pendidikan Terakhir</label>
                                            <input type="text" class="form-control" name="pendidikan_wali" id="pendidikan-wali"
                                                placeholder="Pendidikan Terakhir">
                                            @if ($errors->has('pendidikan_wali'))
                                                <span class="text-danger">{{ $errors->first('pendidikan_wali') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="religion">Agama</label>
                                            <select class="form-control" name="agama_wali" id="religion">
                                                <option selected> Silahkan Dipilih </option>
                                                <option value="islam">Islam</option>
                                                <option value="prostestan">Prostestan</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Buddha</option>
                                                <option value="khonghucu">Khonghucu</option>
                                            </select>
                                        @if ($errors->has('agama_wali'))
                                            <span class="text-danger">{{ $errors->first('agama_wali') }}</span>
                                        @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="pekerjaan-wali">Pekerjaan</label>
                                            <input type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan-wali"
                                                placeholder="Pekerjaan">
                                        @if ($errors->has('pekerjaan'))
                                            <span class="text-danger">{{ $errors->first('pekerjaan') }}</span>
                                        @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="nomer-wali">No. Telp / HP</label>
                                            <input type="number" class="form-control" name="nomer_wali" id="nomer-wali"
                                                placeholder="Nomer yang bisa dihubungi" min="0">
                                        @if ($errors->has('nomer_wali'))
                                            <span class="text-danger">{{ $errors->first('nomer_wali') }}</span>
                                        @endif
                                        </div>
                                      </p>                                
                                    </div>
                                </div>
                            </div>
                            {{-- End Form Data WALI MURID --}}
                            <div class="my-3 px-3 data-berkas">
                                <div class="card">
                                    <div class="card-header">
                                      Data Berkas 
                                    </div>
                                    <div class="card-body">                                      
                                      <p class="card-text">
                                        <small class="form-text bg-danger text-sm text-white p-2 rounded">
                                            Bagi yang Memiliki KIP/KPH dimohon dilampirkan juga, untuk format file SHUS, Kartu Keluarga, KIP/KHS WAJIB berformat jpg,jpeg,pdf
                                        </small>
                                        @if ($errors->has('akte'))
                                            <span class="text-danger">{{ $errors->first('akte') }}</span>
                                        @endif
                                        @if ($errors->has('kk'))
                                            <span class="text-danger">{{ $errors->first('kk') }}</span>
                                        @endif
                                        @if ($errors->has('foto'))
                                            <span class="text-danger">{{ $errors->first('foto') }}</span>
                                        @endif
                                        @if ($errors->has('kartu'))
                                            <span class="text-danger">{{ $errors->first('kartu') }} (Kartu KIP/KPH)</span>
                                        @endif
                                        <div class="form-row">
                                            <div class="form-group col-lg-12 col-xl-3">
                                                <label for="Akte">File Akte Kelahiran</label>
                                                <input type="file" class="form-control-file" name="akte" id="Akte" required>
                                            </div>
                                            <div class="form-group col-lg-12 col-xl-3">
                                                <label for="KK">File Kartu Keluarga</label>
                                                <input type="file" class="form-control-file" name="kk" id="KK" required>
                                            </div>
                                            <div class="form-group col-lg-12 col-xl-3">
                                                <label for="foto">File Foto 3 x 4</label>
                                                <input type="file" class="form-control-file" name="foto" id="foto" required>
                                            </div>
                                            <div class="form-group col-lg-12 col-xl-3">
                                                <label for="Kartu">File KIP / KPH</label>
                                                <input type="file" class="form-control-file" name="kartu" id="Kartu">                                               
                                            </div>                                           
                                        </div>
                                      </p>                                     
                                    </div>
                                </div>
                            </div>                             
                            <div class="col-12">
                                <div class="mx-auto">
                                    <small class="form-text bg-danger text-sm text-white p-2 rounded">
                                        Untuk melanjutkan pendaftaran Dimohon untuk melakukan <strong>Pengecheckkan Ulang Data Pendaftaraan</strong> dengan Menekan Tombol "Validasi Data" 
                                        bila sudah benar Data Pendaftaraannya maka tekan tombol "Betul!"
                                    </small>
                                    <div class="mx-auto">
                                        <div id="button-show"></div>
                                         <a href="javascript:;" class="btn btn-primary m-1 show_data_sd">Validasi Data</a>
                                         <a class="btn btn-secondary m-1" href="/">Kembali</a>
                                     </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
