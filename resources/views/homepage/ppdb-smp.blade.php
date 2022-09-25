@php
 $status = 'SMP TAMAN PELAJAR';   
@endphp

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
                            <form action="/daftar/ppdb/smp" id="form" method="post" enctype="multipart/form-data">
                                @csrf
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
                                                    <input class="form-check-input" type="radio" name="kelamin_siswa"
                                                        id="exampleRadios1" value="pria" required>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Pria
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="kelamin_siswa"
                                                        id="exampleRadios2" value="wanita" required>
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Wanita
                                                    </label>
                                                </div>
                                                @if ($errors->has('kelamin_siswa'))
                                                    <span class="text-danger">{{ $errors->first('kelamin_siswa') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="nisn">NISN (Nomer Induk Siswa Nasional)</label>
                                                <input type="number" class="form-control" min="1" name="nisn_siswa"
                                                    id="nisn" placeholder="NISN"
                                                    required>
                                                @if ($errors->has('nisn_siswa'))
                                                    <span class="text-danger">{{ $errors->first('nisn_siswa') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">NIK (Nomer Induk Kependidikan)</label>
                                                <input type="number" class="form-control" min="1" name="nik_siswa"
                                                    id="nik" placeholder="NIK"
                                                    required>
                                                @if ($errors->has('nik_siswa'))
                                                    <span class="text-danger">{{ $errors->first('nik_siswa') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat, Tanggal Lahir</label>
                                                <div class="form-row px-1">
                                                    <div class="form-group mx-0">
                                                        <input type="text" class="form-control" name="tempat_lahir_siswa" id="ttl"
                                                            placeholder="Tempat Lahir" required>
                                                    </div>
                                                    <div class="form-group mx-2">
                                                        <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                                            <input type="text" class="form-control" name="tanggal_lahir_siswa"
                                                                required>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                                </div>
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
                                                    <option value="lainnya">Lainnya</option>
                                                </select>
                                                @if ($errors->has('agama_siswa'))
                                                    <span class="text-danger">{{ $errors->first('agama_siswa') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat Lengkap</label>
                                                <input type="text" class="form-control" name="alamat_lengkap_siswa"
                                                    id="alamat" placeholder="Alamat Lengkap" required>
                                                @if ($errors->has('alamat_lengkap_siswa'))
                                                    <span class="text-danger">{{ $errors->first('alamat_lengkap_siswa') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="tempat-tinggal">Tempat Tinggal</label>
                                                <select class="form-control" name="tempat_tinggal_siswa" id="tempat-tinggal"
                                                    required> 
                                                    <option selected> Silahkan Dipilih </option>                                                       
                                                    <option value="orang tua">Bersama Orang Tua</option>
                                                    <option value="kost">Kost</option>
                                                    <option value="lainnya">Lainnya</option>
                                                </select>
                                                @if ($errors->has('tempat_tinggal_siswa'))
                                                    <span class="text-danger">{{ $errors->first('tempat_tinggal_siswa') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="kendaraan">Mode Transportasi Ke sekolah</label>
                                                <select class="form-control" name="transport_siswa" id="kendaraan"
                                                    required> 
                                                    <option selected> Silahkan Pilih </option>                                                       
                                                    <option value="Sepeda Motor">Sepeda Motor</option>
                                                    <option value="Jalan Kaki">Jalan Kaki</option>
                                                    <option value="lainnya">Lainnya</option>
                                                </select>
                                                @if ($errors->has('transport_siswa'))
                                                    <span class="text-danger">{{ $errors->first('transport_siswa') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="nomer">No. Telp / HP</label>
                                                <input type="number" class="form-control" min="0" name="nomer_siswa"
                                                    id="nomer" placeholder="Nomer yang bisa dihubungi">
                                                <small>Yang bisa dihubungi, jika mempunyai</small>
                                                @if ($errors->has('nomer_siswa'))
                                                    <span class="text-danger">{{ $errors->first('nomer_siswa') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="KPS">No. KPS / KKS</label>
                                                <input type="number" class="form-control" min="0" name="nomer_kps_siswa"
                                                    id="KPS" placeholder="Jika Menerima">
                                                <small>Jika Menerima</small>
                                                @if ($errors->has('nomer_kps_siswa'))
                                                    <span class="text-danger">{{ $errors->first('nomer_kps_siswa') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Sekolah / Madrasah (SD/MI) Asal</label>
                                                <input type="text" class="form-control" name="asal_sekolah_siswa" required>
                                                @if ($errors->has('asal_sekolah_siswa'))
                                                    <span class="text-danger">{{ $errors->first('asal_sekolah_siswa') }}</span>
                                                @endif
                                            </div>
                                          </p>                                         
                                        </div>
                                    </div>
                                    <div class="card my-3">
                                        <div class="card-header">
                                          B. Keterangan Orang Tua Kandung / Wali Murid
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
                                                    </div>
                                                    @if ($errors->has('tempat_lahir_ayah'))
                                                        <span class="text-danger">{{ $errors->first('tempat_lahir_ayah') }}</span>
                                                    @endif
                                                    @if ($errors->has('tanggal_lahir_ayah'))
                                                        <span class="text-danger">{{ $errors->first('tanggal_lahir_ayah') }}</span>
                                                    @endif
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
                                                    </div>
                                                    @if ($errors->has('tempat_lahir_ibu'))
                                                        <span class="text-danger">{{ $errors->first('tempat_lahir_ibu') }}</span>
                                                    @endif
                                                    @if ($errors->has('tanggal_lahir_ibu'))
                                                        <span class="text-danger">{{ $errors->first('tanggal_lahir_ibu') }}</span>
                                                    @endif
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
                                                    <input type="number" class="form-control" name="nomer_ayah"
                                                        id="nomer-ayah" placeholder="Nomer yang bisa dihubungi"
                                                        required>
                                                    @if ($errors->has('nomer_ayah'))
                                                        <span class="text-danger">{{ $errors->first('nomer_ayah') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="nomer-ibu">Ibu</label>
                                                    <input type="number" class="form-control" name="nomer_ibu" id="nomer-ibu"
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
                                    <div class="card my-3">
                                        <div class="card-header">
                                          C. Data Periodik Calon Peserta Didik
                                        </div>
                                        <div class="card-body">                                          
                                          <p class="card-text">
                                                <div class="form-group row">
                                                    <div class="col-12 col-lg-4 row">
                                                        <label class="col-5 col-lg-4 col-form-label">Tinggi:</label>                                                      
                                                        <div class="col-6 col-lg-5">
                                                            <input type="number" min="1" class="form-control" name="tinggi_calon" required>
                                                            <small>Satuan CM</small>
                                                        @if ($errors->has('tinggi_calon'))
                                                            <span class="text-danger">{{ $errors->first('tinggi_calon') }}</span>
                                                        @endif
                                                        </div>                                                                                             
                                                    </div>
                                                    <div class="col-12 col-lg-4 row">
                                                        <label class="col-5 col-lg-5 col-form-label">Berat Badan:</label>
                                                        <div class="col-6 col-lg-5">
                                                            <input type="number" min="1" class="form-control" name="bb_calon" required>
                                                            <small>Satuan KG</small>
                                                        </div>
                                                        @if ($errors->has('bb_calon'))
                                                            <span class="text-danger">{{ $errors->first('bb_calon') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12 row">
                                                        <label class="col-12 col-lg-3 col-form-label">Jarak Rumah Ke Sekolah :</label>
                                                        <div class="col-6 col-lg-2">
                                                            <input type="number" min="1" class="form-control" name="jarak_rmh" required>
                                                            <small>Satuan KM</small>
                                                        </div>
                                                        @if ($errors->has('jarak_rmh'))
                                                             <span class="text-danger">{{ $errors->first('jarak_rmh') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12 row">
                                                        <label class="col-12 col-lg-3 col-form-label">Waktu Tempuh Ke Sekolah :</label>
                                                        <div class="col-6 col-lg-1 col-form-label">Jam</div> 
                                                        <div class="col-6 col-lg-2">
                                                            <input type="number" min="1" class="form-control" name="jam" required>
                                                        </div>             
                                                        <div class="col-6 col-lg-1 col-form-label">Menit</div>                                              
                                                        <div class="col-6 col-lg-2">                                                           
                                                            <input type="number" min="1" class="form-control" name="menit" required>
                                                        </div>
                                                        @if ($errors->has('jam'))
                                                            <span class="text-danger">{{ $errors->first('jam') }}</span>
                                                        @endif
                                                        @if ($errors->has('menit'))
                                                            <span class="text-danger">{{ $errors->first('menit') }}</span>
                                                        @endif                                               
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12 row">
                                                        <label class="col-6 col-lg-2 col-form-label">Anak Ke :</label>
                                                        <div class="col-6 col-lg-2">
                                                            <input type="number" min="1" class="form-control" name="anakke" required>
                                                        </div>
                                                        @if ($errors->has('anakke'))
                                                            <span class="text-danger">{{ $errors->first('anakke') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card my-3">
                                        <div class="card-header ">
                                          D. Lampiran yang Diserahkan Bersama Formulir Pendaftaraan
                                        </div>
                                        <div class="card-body">                                          
                                          <p class="card-text">
                                            <small class="form-text bg-danger text-sm text-white p-2 rounded">
                                                Bagi yang Memiliki KIP/KPS dimohon dilampirkan juga, untuk format file SHUS, Kartu Keluarga, KIP/KHS WAJIB berformat jpg,jpeg,pdf
                                            </small>
                                            @if ($errors->has('shus'))
                                                <span class="text-danger">{{ $errors->first('shus') }}</span>
                                            @endif
                                            @if ($errors->has('kk'))
                                                <span class="text-danger">{{ $errors->first('kk') }}</span>
                                            @endif
                                            @if ($errors->has('foto'))
                                                <span class="text-danger">{{ $errors->first('foto') }}</span>
                                            @endif
                                            @if ($errors->has('kartu'))
                                                <span class="text-danger">{{ $errors->first('kartu') }} (Kartu KIP/KPS)</span>
                                            @endif
                                            <div class="form-row">
                                                <div class="form-group col-lg-12 col-xl-3">
                                                    <label for="shus">Lampiran File SHUS</label>
                                                    <input type="file" class="form-control-file" name="shus" id="shus" required>
                                                    <small>(Surat Hasil US/M)</small>
                                                </div>
                                                <div class="form-group col-lg-12 col-xl-3">
                                                    <label for="foto">Pas Foto 3 x 4</label>
                                                    <input type="file" class="form-control-file" name="foto" id="foto" required>
                                                    <small>(Bewarna / Hitam Putih)</small>
                                                </div>
                                                <div class="form-group col-lg-12 col-xl-3">
                                                    <label for="kk">Lampiran File Kartu Keluarga</label>
                                                    <input type="file" class="form-control-file" name="kk" id="kk" required>
                                                </div>
                                                <div class="form-group col-lg-12 col-xl-3">
                                                    <label for="kartu">Lampiran File KIP/KPS </label>
                                                    <input type="file" class="form-control-file" name="kartu" id="kartu">
                                                </div>
                                            </div>
                                          </p>                                      
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mx-auto">
                                            <small class="form-text bg-danger text-sm text-white p-2 rounded">
                                                Untuk melanjutkan pendaftaran Dimohon untuk melakukan <strong>Pengecheckkan Ulang Data Pendaftaraan</strong> dengan Menekan Tombol "Validasi Data" 
                                                bila sudah benar Data Pendaftaraannya maka tekan tombol "Betul!"
                                            </small>
                                            <div class="mx-auto">
                                               <div id="button-show" class="col-12"></div>
                                                <a href="javascript:;" class="btn btn-primary show_data m-1">Validasi Data</a>
                                                <a class="btn btn-secondary m-1" href="/">Kembali</a>
                                            </div>
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