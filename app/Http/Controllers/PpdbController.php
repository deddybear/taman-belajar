<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Http\Controllers\StatusLogin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Uuid as Generate;
use PDF;

class PpdbController extends Controller {
    

    // TODO : Check Status PPDB
    public function checkPPDB($slug){
        
        if ($slug == 'sd') {
            
            $data = DB::table('status_ppdb')
                        ->select('status_ppdb.status_ppdb_sd')
                        ->get()->first();

            return $data->status_ppdb_sd;

        } else if ($slug == 'smp') {

            $data = DB::table('status_ppdb')
                        ->select('status_ppdb.status_ppdb_smp')
                        ->get()->first();

            return $data->status_ppdb_smp;
        }
    }

    // TODO : Halaman Pengunjung untuk pendaftaran PPDB
    public function formPPDB($slug){

        if ($slug == 'sd') {
            
            if($this->checkPPDB($slug) == '1'){

                return view('homepage/ppdb-sd');
            
            } else {

                return view('404');
            }
            
            
        } else if ($slug == 'smp'){

            if($this->checkPPDB($slug) == '1'){

                return view('homepage/ppdb-smp'); 
            
            } else {

                return view('404');
                
            }


        } else {

            return redirect('/');

        }



    }

    //TODO HALAMAN PENGUMUMAN PPDB SD / SMP
    public function pagePengumuman($slug){
        
        if($slug == 'smp'){

            $data = Berita::select('tbl_berita.id_kategori', 
                                'tbl_berita.judul_berita',
                                'tbl_berita.isi_berita',
                                'tbl_berita.slug',
                                'tbl_berita.type_berita',
                                'tbl_berita.updated_at',
                                'tbl_user.nama', 
                                'tbl_kategori.nama as nama_kategori')
                        ->join('tbl_kategori', 'tbl_kategori.id_kategori', '=', 'tbl_berita.id_kategori')
                        ->join('tbl_user', 'tbl_user.id_user', 'tbl_berita.id_user')
                        ->where([
                            ['tbl_berita.id_berita', '=', '325565fe'],                            
                        ])
                        ->get()->first();
        return view('homepage/show-artikel', compact('data'));

        } else if($slug == 'sd'){
            
            $data = Berita::select('tbl_berita.id_kategori', 
                                'tbl_berita.judul_berita',
                                'tbl_berita.isi_berita',
                                'tbl_berita.slug',
                                'tbl_berita.type_berita',
                                'tbl_berita.updated_at',
                                'tbl_user.nama', 
                                'tbl_kategori.nama as nama_kategori')
                        ->join('tbl_kategori', 'tbl_kategori.id_kategori', '=', 'tbl_berita.id_kategori')
                        ->join('tbl_user', 'tbl_user.id_user', 'tbl_berita.id_user')
                        ->where([
                            ['tbl_berita.id_berita', '=', '169bcbf1'],                            
                        ])
                        ->get()->first();
        return view('homepage/show-artikel', compact('data'));

        }
    }

    //TODO: Fungsi Daftar PPDB SD
    public function pendaftaranSiswaSd(Request $request){
        
        $valid = Validator::make($request->all(), [
            'nama_siswa'          => 'required|string|max:60',
            'kelamin'             => 'required|alpha|max:7',
            'tempat_lahir_siswa'  => 'required|string|max:30',
            'tanggal_lahir_siswa' => 'required',
            'agama_siswa'         => 'required|alpha|max:15',
            'anak_ke'             => 'required|numeric|digits_between:1,3',
            'jumlah_saudara'      => 'required|numeric|digits_between:1,3',
            'alamat_lengkap'      => 'required|string',
            'nama_ayah'           => 'required|string|max:60',
            'nama_ibu'            => 'required|string|max:60',
            'tempat_lahir_ayah'   => 'required|string|max:30',
            'tanggal_lahir_ayah'  => 'required',
            'tempat_lahir_ibu'    => 'required|string|max:30',
            'tanggal_lahir_ibu'   => 'required',
            'pekerjaan_ayah'      => 'required|string|max:50',
            'pekerjaan_ibu'       => 'required|string|max:50',
            'pendidikan_ayah'     => 'required|string|max:50',
            'pendidikan_ibu'      => 'required|string|max:50',
            'agama_ayah'          => 'required|alpha|max:15',
            'agama_ibu'           => 'required|alpha|max:15',
            'nomer_ayah'          => 'required|numeric|digits_between:1,20',
            'nomer_ibu'           => 'required|numeric|digits_between:1,20',
            'alamat_tempat_ortu'  => 'required|string:100',
            'penghasilan_ayah'    => 'required|max:20',
            'penghasilan_ibu'     => 'required|max:20',
            'keterangan_ayah'     => 'required|string|max:20',
            'keterangan_ibu'      => 'required|string|max:20',
            'nama_wali'           => 'required|string|max:60',
            'tempat_lahir_wali'   => 'required|string|max:30',
            'tanggal_lahir_wali'  => 'required',
            'pendidikan_wali'     => 'required|string|max:50',
            'agama_wali'          => 'required|string|max:15',
            'pekerjaan_wali'      => 'required|string|max:50',
            'nomer_wali'          => 'required|numeric|digits_between:1,20',
            'akte'                => 'required|file|max:2048|mimes:jpg,jpeg,png,pdf',
            'kk'                  => 'required|file|max:2048|mimes:jpg,jpeg,png,pdf',
            'foto'                => 'required|file|max:2048|image',
            'kartu'               => 'mimes:jpg,jpeg,png,pdf|file|max:2048',
        ]);

    

        if($valid->fails()){

            return redirect()->back()->withErrors($valid)->withInput($request->all());

        }

        $namaFileKip = 'kosong';
        $value   = '0123456789abcdefghijklmnopqrstuvwxyz';
        $idAyah  = Generate::uuid4();
        $idIbu   = Generate::uuid4();
        $idWali  = Generate::uuid4();
        $idSiswa = Generate::uuid4();

        $dataAyah = array(
            'id_ayah'             => $idAyah,
            'nama_ayah'           => $request->nama_ayah,
            'ttl_ayah'            => $request->tempat_lahir_ayah.", ".$request->tanggal_lahir_ayah,
            'pendidikan_ayah'     => $request->pendidikan_ayah,
            'agama_ayah'          => $request->agama_ayah,
            'pekerjaan_ayah'      => $request->pekerjaan_ayah,
            'nomer_hub_ayah'      => $request->nomer_ayah,
            'penghasilan_ayah'    => $request->penghasilan_ayah,
            'keterangan_ayah'     => $request->keterangan_ayah
        );

        $dataIbu = array(
            'id_ibu'              => $idIbu,
            'nama_ibu'            => $request->nama_ibu,
            'ttl_ibu'             => $request->tempat_lahir_ibu.", ".$request->tanggal_lahir_ibu,
            'pendidikan_ibu'      => $request->pendidikan_ibu,
            'agama_ibu'           => $request->agama_ibu,
            'pekerjaan_ibu'       => $request->pekerjaan_ibu,
            'nomer_hub_ibu'       => $request->nomer_ibu,
            'penghasilan_ibu'     => $request->penghasilan_ibu,
            'keterangan_ibu'      => $request->keterangan_ibu
        );

        $dataWali = array(
            'id_wali'             => $idWali,
            'nama_wali'           => $request->nama_wali,
            'ttl_wali'            => $request->tempat_lahir_wali.", ".$request->tanggal_lahir_wali,
            'pendidikan_wali'     => $request->pendidikan_wali,
            'agama_wali'          => $request->agama_wali,
            'pekerjaan_wali'      => $request->pekerjaan_wali,
            'nomer_hub_wali'      => $request->nomer_wali
        );

             
        if(DB::table('tbl_ayah_siswa')->insert($dataAyah) && DB::table('tbl_ibu_siswa')->insert($dataIbu) && DB::table('tbl_wali_siswa')->insert($dataWali)){

            $path     = 'file_ppdb/sd/' . $idSiswa;
            
            if ($fileKIP = $request->file('kartu')) {
                 
                $ext         = $fileKIP->getClientOriginalExtension();
                $namaFileKip = substr(str_shuffle($value), 0, 7).".".$ext;
                $fileKIP->move($path, $namaFileKip);

            } else {

                $namaFileKip = 'null';

            }

            if($request->file('akte') && $request->file('kk') && $request->file('foto') ){
                
                $fileAkte      = $request->file('akte');
                $ext           = $fileAkte->getClientOriginalExtension();
                $namaFileAkte  = substr(str_shuffle($value), 0, 7).".".$ext;
                $fileAkte->move($path, $namaFileAkte);

                $fileKK        = $request->file('kk');
                $ext           = $fileKK->getClientOriginalExtension();
                $namaFileKK    = substr(str_shuffle($value), 0, 7).".".$ext;
                $fileKK->move($path, $namaFileKK);
                
                $fileFoto     = $request->file('foto');
                $ext          = $fileFoto->getClientOriginalExtension();
                $namaFileFoto = substr(str_shuffle($value), 0, 7).".".$ext;
                $fileFoto->move($path, $namaFileFoto);
                
            }          
                $dataCalonSiswa = array(
                    'id_calon'            => $idSiswa,
                    'id_ayah'             => $idAyah,
                    'id_ibu'              => $idIbu,
                    'id_wali'             => $idWali,
                    'nama_calon'          => $request->nama_siswa,
                    'kelamin'             => $request->kelamin,
                    'ttl'                 => $request->tempat_lahir_siswa.', '.$request->tanggal_lahir_siswa,
                    'agama_siswa'         => $request->agama_siswa,
                    'anak_ke'             => $request->anak_ke,
                    'jumlah_saudara'      => $request->jumlah_saudara,
                    'alamat_lengkap'      => $request->alamat_lengkap,
                    'alamat_tempat_tinggal_ortu' => $request->alamat_tempat_ortu,
                    'file_akte'           => $namaFileAkte,
                    'file_kk'             => $namaFileKK,
                    'file_foto'           => $namaFileFoto,
                    'file_kip'            => $namaFileKip,
                    'keterima'            => 0,
                    'tahun_daftar'        => date('Y')
                );

                if (DB::table('tbl_ppdb_sd')->insert($dataCalonSiswa)) {
                                        
                     return view('daftar-sukses')->with('id', $idSiswa)->with('kelas', 'sd');   
                }
            }
            return view('daftar-gagal');
    }
        


    
    //TODO: Fungsi Daftar PPDB SMP
    public function pendaftaranSiswaSmp(Request $request){
        
        $valid = Validator::make($request->all(),[
            //Validasi Calon Siswa
            'nama_siswa'          => 'required|string|max:60',
            'kelamin_siswa'       => 'required|alpha|max:7',
            'nisn_siswa'          => 'required|numeric|digits_between:1,20',
            'nik_siswa'           => 'required|numeric|digits_between:1,20',   
            'tempat_lahir_siswa'  => 'required|string|max:30',
            'tanggal_lahir_siswa' => 'required',
            'agama_siswa'         => 'required|alpha|max:15',
            'alamat_lengkap_siswa'=> 'required|string',
            'tempat_tinggal_siswa'=> 'required|max:10',
            'transport_siswa'     => 'required|max:15',
            'nomer_siswa'         => 'min:5|max:15',
            'nomer_kps_siswa'     => 'numeric|digits_between:1,30',
            'asal_sekolah_siswa'  => 'string|max:50',
            //Validasi Orant Tua Calon           
            'nama_ayah'           => 'required|string|max:60',
            'nama_ibu'            => 'required|string|max:60',
            'tempat_lahir_ayah'   => 'required|string|max:30',
            'tanggal_lahir_ayah'  => 'required',
            'tempat_lahir_ibu'    => 'required|string|max:30',
            'tanggal_lahir_ibu'   => 'required',
            'pekerjaan_ayah'      => 'required|string|max:50',
            'pekerjaan_ibu'       => 'required|string|max:50',
            'pendidikan_ayah'     => 'required|string|max:50',
            'pendidikan_ibu'      => 'required|string|max:50',
            'agama_ayah'          => 'required|alpha|max:15',
            'agama_ibu'           => 'required|alpha|max:15',
            'nomer_ayah'          => 'required|numeric||digits_between:1,20',
            'nomer_ibu'           => 'required|numeric||digits_between:1,20',
            'alamat_tempat_ortu'  => 'required|string:100',
            'penghasilan_ayah'    => 'required|max:20',
            'penghasilan_ibu'     => 'required|max:20',
            'keterangan_ayah'     => 'required|string|max:20',
            'keterangan_ibu'      => 'required|string|max:20',
            //Validasi Data Periodik Calon
            'tinggi_calon'        => 'required|numeric|digits_between:1,3',
            'bb_calon'            => 'required|numeric|digits_between:1,3',
            'jarak_rmh'           => 'required|numeric|digits_between:1,3',
            'jam'                 => 'required|numeric|digits_between:1,2',
            'menit'               => 'required|numeric|digits_between:1,2',
            'anakke'              => 'required|numeric|digits_between:1,3',
            //Validasi File 
            'shus'                => 'required|file|max:2048|mimes:jpg,jpeg,png,pdf',
            'foto'                => 'required|file|max:2048|image',
            'kk'                  => 'required|file|max:2048|mimes:jpg,jpeg,png,pdf',
            'kartu'               => 'mimes:jpg,jpeg,png,pdf|file|max:2048',
        ]);

        if ($valid->fails()) {
            
            return redirect()->back()->withErrors($valid)->withInput($request->all());

        }
        
        $value    = '0123456789abcdefghijklmnopqrstuvwxyz';
        $idAyah   = Generate::uuid4();
        $idIbu    = Generate::uuid4();
        $idPridik = Generate::uuid4();
        $idSiswa  = Generate::uuid4();

        $dataAyah = array(
            'id_ayah'             => $idAyah,
            'nama_ayah'           => $request->nama_ayah,
            'ttl_ayah'            => $request->tempat_lahir_ayah.", ".$request->tanggal_lahir_ayah,
            'pekerjaan_ayah'      => $request->pekerjaan_ayah,
            'pendidikan_ayah'     => $request->pendidikan_ayah,
            'agama_ayah'          => $request->agama_ayah,
            'nomer_hub_ayah'      => $request->nomer_ayah,
            'penghasilan_ayah'    => $request->penghasilan_ayah,
            'keterangan_ayah'     => $request->keterangan_ayah
        );

        $dataIbu = array(
            'id_ibu'              => $idIbu,
            'nama_ibu'            => $request->nama_ibu,
            'ttl_ibu'             => $request->tempat_lahir_ibu.", ".$request->tanggal_lahir_ibu,
            'pendidikan_ibu'      => $request->pendidikan_ibu,
            'agama_ibu'           => $request->agama_ibu,
            'pekerjaan_ibu'       => $request->pekerjaan_ibu,
            'nomer_hub_ibu'       => $request->nomer_ibu,
            'penghasilan_ibu'     => $request->penghasilan_ibu,
            'keterangan_ibu'      => $request->keterangan_ibu
        );

        $dataPeriodik = array(
            'id_periodik'       => $idPridik,
            'tinggi'            => $request->tinggi_calon." CM",
            'berat_badan'       => $request->bb_calon." KG",
            'jarak_sekolah'     => $request->jarak_rmh." KM",
            'waktu_tempuh'      => $request->jam." Jam ". $request->menit."Menit",
            'anak_ke'           => $request->anakke, 
        );

        if(DB::table('tbl_ayah_siswa')->insert($dataAyah) && DB::table('tbl_ibu_siswa')->insert($dataIbu) && DB::table('tbl_data_periodik_smp')->insert($dataPeriodik)){

            $path = 'file_ppdb/smp/' . $idSiswa;

            if ($fileKIP = $request->file('kartu')) {
 
                $ext = $fileKIP->getClientOriginalExtension();
                $namaFileKIP = substr(str_shuffle($value), 0, 7).".".$ext;
                $fileKIP->move($path, $namaFileKIP);

            } else {

                $namaFileKIP = 'null';

            }

            if ($request->file('shus') && $request->file('kk') && $request->file('foto')) {
                 
                $fileShus      = $request->file('shus');
                $ext           = $fileShus->getClientOriginalExtension();
                $namaFileShus  = substr(str_shuffle($value), 0, 7).".".$ext;
                $fileShus->move($path, $namaFileShus);

                $fileKK        = $request->file('kk');
                $ext           = $fileKK->getClientOriginalExtension();
                $namaFileKK    = substr(str_shuffle($value), 0, 7).".".$ext;
                $fileKK->move($path, $namaFileKK);
                
                $fileFoto     = $request->file('foto');
                $ext          = $fileFoto->getClientOriginalExtension();
                $namaFileFoto = substr(str_shuffle($value), 0, 7).".".$ext;
                $fileFoto->move($path, $namaFileFoto);
            }

            $dataCalonSiswa = array(
                'id_calon'            => $idSiswa,
                'id_ayah'             => $idAyah,
                'id_ibu'              => $idIbu,
                'id_periodik'         => $idPridik,
                'nama_calon'          => $request->nama_siswa,
                'kelamin'             => $request->kelamin_siswa,
                'nisn'                => $request->nisn_siswa,
                'nik'                 => $request->nik_siswa,
                'ttl'                 => $request->tempat_lahir_siswa. ", " .$request->tanggal_lahir_siswa,
                'agama_siswa'         => $request->agama_siswa,
                'alamat_lengkap'      => $request->alamat_lengkap_siswa,
                'tempat_tinggal'      => $request->tempat_tinggal_siswa,
                'alamat_ortu'         => $request->alamat_tempat_ortu,
                'transportasi'        => $request->transport_siswa,
                'no_hub'              => $request->nomer_siswa,
                'no_kps_khs'          => $request->nomer_kps_siswa,
                'asal_sekolah'        => $request->asal_sekolah_siswa,
                'file_shus'           => $namaFileShus,
                'file_kk'             => $namaFileKK,
                'file_foto'           => $namaFileFoto,
                'file_kip'            => $namaFileKIP,
                'keterima'            => 0,
                'tahun_daftar'        => date("Y")
            );

            if(DB::table('tbl_ppdb_smp')->insert($dataCalonSiswa)){
    //BUG
               return view('daftar-sukses')->with('id', $idSiswa)->with('kelas', 'smp');
            }
        } 
        
        return view('daftar-gagal');

    }

    // TODO: -------------------Admin Function----------------------------------

    public function dashboardPpdb(){
        
        if(StatusLogin::check()){

            if (url()->current() == url('/panel-admin/ppdb-sd')) {
            
                return view('admin/admin-ppdb-sd');
            
            } else {
    
                return view('admin/admin-ppdb-smp');
    
            }

        }

    }
    
    public function downloadDataPPDB($kelas, $id){
        
        if($kelas == 'sd') {

            $sql = DB::table('tbl_ppdb_sd')
                    ->join('tbl_ayah_siswa', 'tbl_ayah_siswa.id_ayah', 'tbl_ppdb_sd.id_ayah')
                    ->join('tbl_ibu_siswa', 'tbl_ibu_siswa.id_ibu', 'tbl_ppdb_sd.id_ibu')
                    ->join('tbl_wali_siswa', 'tbl_wali_siswa.id_wali', 'tbl_ppdb_sd.id_wali')
                    ->select('tbl_ppdb_sd.*', 'tbl_ayah_siswa.*', 'tbl_ibu_siswa.*', 'tbl_wali_siswa.*')
                    ->where('tbl_ppdb_sd.id_calon', $id)
                    ->get()->first();

                $data = array(
                   'id'             => $sql->id_calon,
                   'nama_siswa'     => $sql->nama_calon,
                   'kelamin'        => $sql->kelamin,
                   'ttl'            => $sql->ttl,
                   'agama_siswa'    => $sql->agama_siswa,
                   'anak_ke'        => $sql->anak_ke,
                   'jumlah_saudara' => $sql->jumlah_saudara,
                   'alamat_lengkap' => $sql->alamat_lengkap,
                   'file_foto'      => $sql->file_foto,
                   'nama_ayah'      => $sql->nama_ayah,
                   'nama_ibu'       => $sql->nama_ibu,
                   'ttl_ayah'       => $sql->ttl_ayah,
                   'ttl_ibu'        => $sql->ttl_ibu,
                   'pekerjaan_ayah' => $sql->pekerjaan_ayah,
                   'pekerjaan_ibu'  => $sql->pekerjaan_ibu,
                   'pendidikan_ayah'=> $sql->pendidikan_ayah,
                   'pendidikan_ibu' => $sql->pendidikan_ibu,
                   'agama_ayah'     => $sql->agama_ayah,
                   'agama_ibu'      => $sql->agama_ibu,
                   'nomer_hub_ayah' => $sql->nomer_hub_ayah,
                   'nomer_hub_ibu'  => $sql->nomer_hub_ibu,
                   'penghasilan_ayah' => $sql->penghasilan_ayah,
                   'penghasilan_ibu'  => $sql->penghasilan_ibu,
                   'keterangan_ayah'  => $sql->keterangan_ayah,
                   'keterangan_ibu'   => $sql->keterangan_ibu,
                   'alamat_ortu'      => $sql->alamat_tempat_tinggal_ortu,
                   'nama_wali'        => $sql->nama_wali,
                   'ttl_wali'         => $sql->ttl_wali,
                   'agama_wali'       => $sql->agama_wali,
                   'pendidikan_wali'  => $sql->pendidikan_wali,
                   'pekerjaan_wali'   => $sql->pekerjaan_wali,
                   'nomer_hub_wali'   => $sql->nomer_hub_wali
                );


                date_default_timezone_set("Asia/Jakarta");
                $pdf = PDF::loadView('pdf-sd', $data);
                return $pdf->download('Data Pendaftaran ID: '. $id .'.pdf');

        } else if($kelas == 'smp'){

            $sql = DB::table('tbl_ppdb_smp')
            ->join('tbl_ayah_siswa', 'tbl_ayah_siswa.id_ayah', 'tbl_ppdb_smp.id_ayah')
            ->join('tbl_ibu_siswa', 'tbl_ibu_siswa.id_ibu', 'tbl_ppdb_smp.id_ibu')
            ->join('tbl_data_periodik_smp', 'tbl_data_periodik_smp.id_periodik', 'tbl_ppdb_smp.id_periodik')
            ->select('tbl_ppdb_smp.*', 'tbl_ayah_siswa.*', 'tbl_ibu_siswa.*', 'tbl_data_periodik_smp.*')
            ->where('tbl_ppdb_smp.id_calon', $id)
            ->get()->first();
            
            $data = array(
                'id'             => $sql->id_calon,
                'nama_siswa'     => $sql->nama_calon,
                'nisn'           => $sql->nisn,
                'nik'            => $sql->nik,
                'kelamin'        => $sql->kelamin,
                'ttl'            => $sql->ttl,
                'agama_siswa'    => $sql->agama_siswa,
                'alamat_lengkap' => $sql->alamat_lengkap,
                'file_foto'      => $sql->file_foto,
                'nama_ayah'      => $sql->nama_ayah,
                'nama_ibu'       => $sql->nama_ibu,
                'ttl_ayah'       => $sql->ttl_ayah,
                'ttl_ibu'        => $sql->ttl_ibu,
                'pekerjaan_ayah' => $sql->pekerjaan_ayah,
                'pekerjaan_ibu'  => $sql->pekerjaan_ibu,
                'pendidikan_ayah'=> $sql->pendidikan_ayah,
                'pendidikan_ibu' => $sql->pendidikan_ibu,
                'agama_ayah'     => $sql->agama_ayah,
                'agama_ibu'      => $sql->agama_ibu,
                'nomer_hub_ayah' => $sql->nomer_hub_ayah,
                'nomer_hub_ibu'  => $sql->nomer_hub_ibu,
                'penghasilan_ayah' => $sql->penghasilan_ayah,
                'penghasilan_ibu' => $sql->penghasilan_ibu,
                'keterangan_ayah' => $sql->keterangan_ayah,
                'keterangan_ibu'  => $sql->keterangan_ibu,
                'alamat_ortu'     => $sql->alamat_ortu,
                'tinggi'          => $sql->tinggi,
                'berat_badan'     => $sql->berat_badan,
                'jarak_sekolah'   => $sql->jarak_sekolah,
                'waktu_tempuh'    => $sql->waktu_tempuh,
                'anak_ke'         => $sql->anak_ke
            );


            date_default_timezone_set("Asia/Jakarta");
            $pdf = PDF::loadView('pdf-smp', $data);
            return $pdf->download('Data Pendaftaran ID: '. $id .'.pdf');

        } else {
            return view('404');
        }
    }
    
    public function countDataPPDB(){
        //menghitung Data PPDB selama 5 tahun untuk dashboard
        $data = array();
        
        for($i = 0; $i <= 5; $i++){

            $dataSD = DB::table('tbl_ppdb_sd')->where('tahun_daftar', date('Y') - $i)->count();
            $dataSMP = DB::table('tbl_ppdb_smp')->where('tahun_daftar', date('Y') - $i)->count();    
            $data[5 - $i] = $dataSD + $dataSMP;
        }

        return response()->json($data);
       // return json_encode($data);
        
    }


    

    //TODO DATA LIST PPDB-SD
    public function dataPpdbSd(){
    
        if (StatusLogin::check()){

            $data = DB::table('tbl_ppdb_sd')
                    ->join('tbl_ayah_siswa', 'tbl_ayah_siswa.id_ayah', 'tbl_ppdb_sd.id_ayah')
                    ->join('tbl_ibu_siswa', 'tbl_ibu_siswa.id_ibu', 'tbl_ppdb_sd.id_ibu')
                    ->join('tbl_wali_siswa', 'tbl_wali_siswa.id_wali', 'tbl_ppdb_sd.id_wali')
                    ->select(
                        'tbl_ppdb_sd.id_calon',
                        'tbl_ppdb_sd.tahun_daftar',
                        'tbl_ppdb_sd.keterima',
                        'tbl_ppdb_sd.nama_calon',                   
                        'tbl_ppdb_sd.ttl',
                        'tbl_ppdb_sd.alamat_lengkap',
                        'tbl_ayah_siswa.nama_ayah',
                        'tbl_ibu_siswa.nama_ibu',
                        'tbl_wali_siswa.nama_wali',
                        'tbl_ppdb_sd.file_akte',
                        'tbl_ppdb_sd.file_kk',
                        'tbl_ppdb_sd.file_foto',
                        'tbl_ppdb_sd.file_kip')
                    ->get();
            
            return json_encode($data);
        }
        
    }

    //TODO DATA CALON PENDAFTARAN SMP
    public function dataPpdbSmp(){
        
        if(StatusLogin::check()){

            $data = DB::table('tbl_ppdb_smp')
                    ->join('tbl_ayah_siswa', 'tbl_ayah_siswa.id_ayah', 'tbl_ppdb_smp.id_ayah')
                    ->join('tbl_ibu_siswa', 'tbl_ibu_siswa.id_ibu', 'tbl_ppdb_smp.id_ibu')
                    ->join('tbl_data_periodik_smp', 'tbl_data_periodik_smp.id_periodik', 'tbl_ppdb_smp.id_periodik')
                    ->select(
                        'tbl_ppdb_smp.id_calon',
                        'tbl_ppdb_smp.tahun_daftar',
                        'tbl_ppdb_smp.keterima',
                        'tbl_ppdb_smp.nama_calon',
                        'tbl_ppdb_smp.asal_sekolah',
                        'tbl_ppdb_smp.kelamin',
                        'tbl_ppdb_smp.nisn',
                        'tbl_ppdb_smp.nik',
                        'tbl_ppdb_smp.ttl',
                        'tbl_ppdb_smp.alamat_lengkap',
                        'tbl_ppdb_smp.no_hub',
                        'tbl_ayah_siswa.nama_ayah',
                        'tbl_ibu_siswa.nama_ibu',
                        'tbl_ppdb_smp.file_shus',                        
                        'tbl_ppdb_smp.file_kk',
                        'tbl_ppdb_smp.file_foto',
                        'tbl_ppdb_smp.file_kip')
                    ->get();
            
            return json_encode($data);
        }
    }

    //TODO GET BERITA PENGUMUMAN PPDB
    public function beritaPengumuman(){

        if(StatusLogin::check()){

            if(url()->current() == url('admin/ppdb-smp/get-pengumuman')){

                $data = Berita::select('tbl_berita.judul_berita',
                                       'tbl_berita.isi_berita',
                                       'tbl_berita.updated_at',
                                       'tbl_user.nama')
                                    ->join('tbl_user', 'tbl_user.id_user', 'tbl_berita.id_user')
                                    ->where([
                                        ['tbl_berita.id_kategori', '=', 'S1'],
                                        ['tbl_berita.type_berita', '=', 'smp'],                                
                                    ])
                                    ->get()->first();

                return json_encode($data);

            } else if (url()->current() == url('admin/ppdb-sd/get-pengumuman')){

                $data = Berita::select('tbl_berita.judul_berita',
                                       'tbl_berita.isi_berita',
                                       'tbl_berita.updated_at',
                                       'tbl_user.nama')
                                    ->join('tbl_user', 'tbl_user.id_user', 'tbl_berita.id_user')
                                    ->where([
                                        ['tbl_berita.id_kategori', '=', 'S1'],
                                        ['tbl_berita.type_berita', '=', 'sd'],                                
                                    ])
                                    ->get()->first();

                return json_encode($data);
            }

        }
    }
    //!KURANG UPDATE DAN POST DI HALAMAN USER
    //TODO : Update Pengumuman PPDB SD - SMP 
    public function updatePengumuman(Request $request){
       
        if(StatusLogin::check()){

            if(url()->current() == url('admin/ppdb-sd/update-pengumuman')){
                
                $image_name = '/images/artikel/default.jpg'; //Default jika tidak ada foto
                $type_path = 'sd';
                $path_name = 'images/artikel/sekolahan/'.$type_path.'/';

                $valid = Validator::make($request->all(), [
                    'judul_berita' => 'required',
                    'news'         => 'required'
                ]);
            
                if($valid->fails()){
                    return response()->json(['error' => $valid->errors()->all()]);
                }

            
                $news = $request->news;
                $dom = new \DomDocument();
                $dom->loadHtml($news, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $images = $dom->getElementsByTagName('img');

                foreach($images as $count => $image){
                    
                    $data = $image->getAttribute('src');
                    $file_name = $image->getAttribute('data-filename');
                    
                    if (preg_match('/data:image/', $data)) {
                    
                        list($type, $data) = explode(';', $data);
                        list(, $data)      = explode(',', $data);
                        $data = base64_decode($data);
                    
                        $image_name = $path_name.$file_name;
                        $path = $image_name;
                        file_put_contents($path, $data);
                    
                    
                        $image->removeAttribute('src');
                        $image->setAttribute('src', '/'. $image_name);
                    }
                
                    $news = $dom->savehtml();
                }

                $data = array(
                    'id_user'      => $request->session()->get('id_user'),
                    'id_kategori'  => 'S1',
                    'judul_berita' => $request->judul_berita,
                    'sampul_berita'=> $image_name,
                    'isi_berita'   => $news,
                    'slug'         => Str::slug($request->judul_berita, '-'),
                    'type_berita'  => $type_path
                );

                if(Berita::where('id_berita', '169bcbf1')->update($data)){
                    return response()->json(['sukses' => 'Berita Pengumuman Berhasil dirubah']);
                }

            } else if (url()->current() == url('admin/ppdb-smp/update-pengumuman')){
               
                $image_name = '/images/artikel/default.jpg'; //Default jika tidak ada foto
                $type_path = 'smp';
                $path_name = '/images/artikel/sekolahan/'.$type_path;

                $valid = Validator::make($request->all(), [
                    'judul_berita' => 'required',
                    'news'         => 'required'
                ]);
            
                if($valid->fails()){
                    return response()->json(['error' => $valid->errors()->all()]);
                }

            
                $news = $request->news;
                $dom = new \DomDocument();
                $dom->loadHtml($news, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $images = $dom->getElementsByTagName('img');

                foreach($images as $count => $image){
                    $data = $image->getAttribute('src');
                    $file_name = $image->getAttribute('data-filename');
                    if (preg_match('/data:image/', $data)) {
                    
                        list($type, $data) = explode(';', $data);
                        list(, $data)      = explode(',', $data);
                        $data = base64_decode($data);
                    
                        $image_name = $path_name.$file_name;
                        $path = $image_name;
                        file_put_contents($path, $data);
                    
                    
                        $image->removeAttribute('src');
                        $image->setAttribute('src', $image_name);
                    }
                
                    $news = $dom->savehtml();
                }

                $data = array(
                    'id_user'      => $request->session()->get('id_user'),
                    'id_kategori'  => 'S1',
                    'judul_berita' => $request->judul_berita,
                    'sampul_berita'=> $image_name,
                    'isi_berita'   => $news,
                    'slug'         => Str::slug($request->judul_berita, '-'),
                    'type_berita'  => $type_path
                );

                if(Berita::where('id_berita', '325565fe')->update($data)){
                    return response()->json(['sukses' => 'Berita Pengumuman Berhasil dirubah']);
                }
            }
        }
    }


    //TODO GET STATUS PPDB
    public function statusPPDB(){
        
        if (StatusLogin::check()) {
            
            if (url()->current() == url('admin/ppdb-smp/status')) {
               
                $data = DB::table('status_ppdb')
                        ->select('status_ppdb.status_ppdb_smp')
                        ->get()->first();

                return json_encode($data);
            
            } else {

                $data = DB::table('status_ppdb')
                        ->select('status_ppdb.status_ppdb_sd')
                        ->get()->first();

                return json_encode($data);

            }

        }
    
    }

    //TODO CHANGE STATUS PPDB
    public function changeStatusPpdb(Request $request){
        
        if (StatusLogin::check()) {
            
           if (url()->current() == url('admin/ppdb-smp/buka')) {

               if(DB::table('status_ppdb')->where('status_ppdb.status_ppdb_smp', 0)->update(['status_ppdb_smp' => $request->status])){
                  return response()->json(['sukses' => "Form Pendaftaran PPDB SMP Berhasil dibuka"]);
               }
                
           } else if(url()->current() == url('admin/ppdb-smp/tutup')){
                
                if(DB::table('status_ppdb')->where('status_ppdb.status_ppdb_smp', 1)->update(['status_ppdb_smp' => $request->status])){
                  return response()->json(['sukses' => "Form Pendaftaran PPDB SMP Berhasil ditutup"]);
                }
                        
           } else if(url()->current() == url('admin/ppdb-sd/buka')){

                if(DB::table('status_ppdb')->where('status_ppdb.status_ppdb_sd', 0)->update(['status_ppdb_sd' => $request->status])){
                    return response()->json(['sukses' => "Form Pendaftaran PPDB SD Berhasil dibuka"]);
                }

           } else if(url()->current() == url('admin/ppdb-sd/tutup')){

                if(DB::table('status_ppdb')->where('status_ppdb.status_ppdb_sd', 1)->update(['status_ppdb_sd' => $request->status])){
                    return response()->json(['sukses' => "Form Pendaftaran PPDB SD Berhasil ditutup"]);
                }
           }

        }

    }


    //TODO CHANGE DATA CALON PPDB SD
    public function changeStatusSd($id){
        
        if(StatusLogin::check()){
            
            $sql = DB::table('tbl_ppdb_sd')
                   ->select('tbl_ppdb_sd.keterima')
                   ->where('tbl_ppdb_sd.id_calon', $id)
                   ->get()->first();
            
            if($sql){

                if ($sql->keterima == 0) {
                
                    if (DB::table('tbl_ppdb_sd')->where('tbl_ppdb_sd.id_calon', $id)->update(['keterima' => 1])) {
                        
                        return response()->json(['sukses' => 'Data Berhasil dirubah']);
                    }

                
                } else if ($sql->keterima == 1){

                    if (DB::table('tbl_ppdb_sd')->where('tbl_ppdb_sd.id_calon', $id)->update(['keterima' => 0])) {

                        return response()->json(['sukses' => 'Data Berhasil dirubah']);
                    
                    }

                }

            }
        }

    }

    //TODO CHANGE DATA CALON PPDB SMP
    public function changeStatusSmp($id){
        
        if(StatusLogin::check()){

            $sql = DB::table('tbl_ppdb_smp')
                   ->select('tbl_ppdb_smp.keterima')
                   ->where('tbl_ppdb_smp.id_calon', $id)
                   ->get()->first();
            if($sql){

                if ($sql->keterima == 0) {
                    
                    if(DB::table('tbl_ppdb_smp')->where('tbl_ppdb_smp.id_calon', $id)->update(['keterima' => 1])){

                        return response()->json(['sukses' => 'Data Berhasil dirubah']);

                    }

                } else if ($sql->keterima == 1){
                    
                    if(DB::table('tbl_ppdb_smp')->where('tbl_ppdb_smp.id_calon', $id)->update(['keterima' => 0])){

                        return response()->json(['sukses' => 'Data Berhasil dirubah']);

                    }

                }
            }
        }
    }

     //TODO DELETE DATA CLON PPDB SD
    public function deleteDataPpdbSd($id){
        
        if(StatusLogin::check()){
            
            $sql = DB::table('tbl_ppdb_sd')
                   ->select('tbl_ppdb_sd.id_ayah', 'tbl_ppdb_sd.id_ibu', 'tbl_ppdb_sd.id_wali')
                   ->where('tbl_ppdb_sd.id_calon', $id)
                   ->get()->first();
                   
            if($sql){
                $idAyah = $sql->id_ayah;
                $idIbu  = $sql->id_ibu;
                $idWali = $sql->id_wali;

                if (DB::table('tbl_ayah_siswa')->where('id_ayah', $idAyah)->delete() && DB::table('tbl_ibu_siswa')->where('id_ibu', $idIbu)->delete() && DB::table('tbl_wali_siswa')->where('id_wali', $idWali)->delete() && DB::table('tbl_ppdb_sd')->where('id_calon', $id)->delete()){
                    if(File::exists('file_ppdb/sd/'. $id) && File::deleteDirectory('file_ppdb/sd/'. $id)){
                        return response()->json(['sukses' => 'Data & File Berhasil Dihapus']);
                    } else {
                        return response()->json(['sukses' => 'Data Berhasil Dihapus']);
                    }
                }  
            }
        }
    }

    
    //TODO DELETE DATA CALON PPDB SMP
    public function deleteDataPpdbSmp($id){
        
        if (StatusLogin::check()) {
            
            $sql = DB::table('tbl_ppdb_smp')
                   ->select('tbl_ppdb_smp.id_ayah', 'tbl_ppdb_smp.id_ibu', 'tbl_ppdb_smp.id_periodik')
                   ->where('tbl_ppdb_smp.id_calon', $id)
                   ->get()->first();

            if($sql){
                $idAyah     = $sql->id_ayah;
                $idIbu      = $sql->id_ibu;
                $idPeriodik = $sql->id_periodik;
                
                if (DB::table('tbl_ayah_siswa')->where('id_ayah', $idAyah)->delete() && DB::table('tbl_ibu_siswa')->where('id_ibu', $idIbu)->delete() && DB::table('tbl_data_periodik_smp')->where('id_periodik', $idPeriodik)->delete() && DB::table('tbl_ppdb_smp')->where('id_calon', $id)->delete()) {
                    if(File::exists('file_ppdb/smp/'. $id) && File::deleteDirectory('file_ppdb/smp/'. $id)){

                        return response()->json(['sukses' => 'Data & File Berhasil Dihapus']);
                        
                    } else {
                        return response()->json(['sukses' => 'Data Berhasil Dihapus']);
                    }
                }
            }
        }

    }

}
