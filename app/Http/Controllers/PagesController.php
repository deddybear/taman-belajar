<?php

namespace App\Http\Controllers;


use App\Models\Berita;
use App\Http\Controllers\StatusLogin;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller {
     
    // TODO : Pages Admin
        
    public function loginPage(){

        if (StatusLogin::check()) {
       
            return redirect('/panel-admin/dashboard');
        
        }

        return view('admin/login');
    
    }

    public function countDataArtikel($idKategori){
        return Berita::where('id_kategori', $idKategori)->count();
    }

    

    public function dashboardPage(){
        
        if(StatusLogin::check()){

            return view('admin/index', [
                'artikel_sekolah' => $this->countDataArtikel('A1'),
                'artikel_siswa'   => $this->countDataArtikel('A2'),
                'artikel_guru'    => $this->countDataArtikel('A3')
            ]);    
            
        }

        return redirect('/');
    }



    public function registerPage(){

        if(StatusLogin::check()){

            return view('admin/register');
        
        }
        
        return redirect('/');
        
    }

    public function editAccountPage(){
        
        if(StatusLogin::check()){
            
            return view('admin/edit-account');    
        
        }


        return redirect('/');
    }

    

    // TODO : User Homepage

    public function showArtikel($idKategori){
        
        return Berita::select('tbl_berita.judul_berita',
                               'tbl_berita.id_kategori',
                               'tbl_berita.sampul_berita',
                               'tbl_berita.isi_berita',
                               'tbl_berita.slug',
                               'tbl_berita.updated_at',                          
                              )                        
                        ->where('tbl_berita.id_kategori', $idKategori)
                        ->orderBy('tbl_berita.created_at', 'desc')
                        ->limit(4)
                        ->get();
    
    }

    public function firstArtikel($idKategori){
        
        return Berita::select('tbl_berita.judul_berita',
                               'tbl_berita.id_kategori',
                               'tbl_berita.sampul_berita',
                               'tbl_berita.isi_berita',
                               'tbl_berita.slug',
                               'tbl_berita.updated_at',
                               'tbl_user.nama'
                            )
                        ->join('tbl_user', 'tbl_user.id_user', '=', 'tbl_berita.id_user')
                        ->where('tbl_berita.id_kategori', $idKategori) 
                        ->inRandomOrder()
                        ->get()
                        ->first(); 
    }


    public function homePage(){

        return view('homepage/index', [
            'first_sekolahan' => $this->firstArtikel('A1'),
            'berita_sekolahan' => $this->showArtikel('A1'),
            'first_siswa' => $this->firstArtikel('A2'),
            'berita_siswa' => $this->showArtikel('A2'),
            'first_guru' => $this->firstArtikel('A3'),
            'berita_guru' => $this->showArtikel('A3')
        ]);


    }

 
    public function test(){
        
        $data = array();
       
        for($i = 0; $i <= 5; $i++){

            $dataSD = DB::table('tbl_ppdb_sd')->where('tahun_daftar', date('Y') - $i)->count();
            $dataSMP = DB::table('tbl_ppdb_smp')->where('tahun_daftar', date('Y') - $i)->count();    
            $data[date('Y') - $i] = $dataSD + $dataSMP;
        }
       

    }
}
