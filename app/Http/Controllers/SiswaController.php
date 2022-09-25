<?php

namespace App\Http\Controllers;
use App\Http\Controllers\StatusLogin;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid as Generate;


class SiswaController extends Controller {

    public function pageDataSiswa($slug){
        
        if ($slug == 'sd') {

            $data = Siswa::select('nama', 'kelas', 'nis', 'nisn')->where('id_sekolah', '5bf660ba-fd9a-4711-bd64-2fe79d8c91c5')->get();
    
            return view('homepage/data-siswa', compact("data"));

        } else if ($slug == 'smp'){

            $data = Siswa::select('nama', 'kelas', 'nis', 'nisn')->where('id_sekolah','be104838-0902-438c-a0a7-d3fdc7dbc080')->get();

            return view('homepage/data-siswa', compact('data'));

        } else {

            return view('404');
        
        }

    }

    //TODO : Halaman Admin Dashboard
    
    public function index(){
        
        if (StatusLogin::check()) {
            
            return view('admin/data-siswa');

        }

        return redirect('/');

    }

    //Untuk Halaman Dashboard
    public function countDataSiswa(){
        $countSiswaSD = Siswa::where('id_sekolah', '5bf660ba-fd9a-4711-bd64-2fe79d8c91c5')->count();
        $countSiswaSMP = Siswa::where('id_sekolah', 'be104838-0902-438c-a0a7-d3fdc7dbc080')->count();
        $data = array(
            'banyak_sd' => $countSiswaSD,
            'banyak_smp'=> $countSiswaSMP
        );
        return json_encode($data);
    }

    public function dataSiswa($kelasId){
        
        if(StatusLogin::check()){

            $data = Siswa::select('*')->where('id_sekolah', $kelasId)->get();

            return json_encode($data);
        }

    }

    public function tambahData($kelasId, Request $request){
        
        if (StatusLogin::check()) {
            
            $valid = Validator::make($request->all(), [
                'nama' => 'required|string|max:50',
                'kelas'=> 'required|max:5',
                'nis'  => 'required|alpha_num|unique:tbl_data_siswa,nis',
                'nisn' => 'required|alpha_num|unique:tbl_data_siswa,nisn'
            ]);

            if($valid->fails()){

                return response()->json(['error' => $valid->errors()->all()]);
            
            }

            Siswa::create([
                'id_siswa'   => Generate::uuid4(),
                'id_sekolah' => $kelasId,
                'kelas'      => $request->kelas,
                'nama'       => $request->nama,
                'nis'        => $request->nis,
                'nisn'       => $request->nisn
            ]);

            return response()->json(['sukses' => 'Data berhasil ditambahkan']);
        }

        return redirect('/');

    }

    public function selectData($id){
        
        if (StatusLogin::check()) {
        
            $data = Siswa::where('id_siswa', $id)->get();
            return json_encode($data);
        }

        return redirect('/');

    }

    public function updateData($id, Request $request){
        
        if (StatusLogin::check()) {
        
            $valid = Validator::make($request->all(), [
                'nama' => 'required|string|max:50',
                'kelas'=> 'required|max:5',
                'nis'  => 'required|alpha_num',
                'nisn' => 'required|alpha_num'
            ]);

            
            if($valid->fails()){

                return response()->json(['error' => $valid->errors()->all()]);
            
            }

            $data = array(
                'nama'       => $request->nama,
                'kelas'      => $request->kelas,
                'nis'        => $request->nis,
                'nisn'       => $request->nisn
            );
            
            if (Siswa::where('id_siswa', $id)->update($data) ) {
                
                return response()->json(['sukses' => 'Data berhasil diupdated']);

            }

        }

        return redirect('/');

    }

    public function deleteData($id){

       if (StatusLogin::check()) {
           if ( Siswa::where('id_siswa', $id)->delete() ) {
                return response()->json(['sukses' => 'Data berhasil dihapus']);
           }
       }

       return redirect('/');

    }

}
