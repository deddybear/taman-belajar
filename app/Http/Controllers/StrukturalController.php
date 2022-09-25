<?php

namespace App\Http\Controllers;

use App\Models\Struktural;
use App\Http\Controllers\StatusLogin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid as Generate;

class StrukturalController extends Controller {
    

    public function homepage($slug){
        
        $data = Struktural::select('*')->where('slug', $slug)->get();
        return view('homepage/struktural', compact('data'));
        
    }

    public function index($slug){
        
        if (StatusLogin::check()) {
            
            return view('admin/struktural', compact('slug'));
        
        }

    }

    public function dataStruktural($idSekolah){
       
        if (StatusLogin::check()) {
           
            $data = Struktural::select('*')->where('id_sekolah', $idSekolah)->get();
            return json_encode($data);
        
        }

    }

    public function addData($idSekolah, $slug, Request $request){
        
        if (StatusLogin::check()) {
            
            $valid = Validator::make($request->all(), [
                'nama' => 'required|max:50|string',
                'nuptk' => 'required|alpha_num',
                'jabatan' => 'required|string',
            ]);

            if($valid->fails()){

                return response()->json(['error' => $valid->errors()->all()]);
            
            }

            Struktural::create([
                'id_struktural' => Generate::uuid4(),
                'id_sekolah'    => $idSekolah,
                'slug'          => $slug,
                'nama'          => $request->nama,
                'nuptk'         => $request->nuptk,
                'jabatan'       => $request->jabatan
            ]);

            return response()->json(['sukses' => 'Data berhasil ditambahkan']);
        }

        return redirect('/');

    }

    public function selectData($id){
        
        if(StatusLogin::check()){
            $data = Struktural::where('id_struktural', $id)->get();
            return json_encode($data);
        }

        return redirect('/');

    }

    public function updateData($id, Request $request){
        
        if (StatusLogin::check()){

            $valid = Validator::make($request->all(), [
                'nama' => 'required|max:50|string',
                'nuptk' => 'required|alpha_num',
                'jabatan' => 'required|string',
            ]);

            if($valid->fails()){

                return response()->json(['error' => $valid->errors()->all()]);
            
            }

            $data = array (
                'nama' => $request->nama,
                'nuptk'=> $request->nuptk,
                'jabatan' => $request->jabatan
            );

            if (Struktural::where('id_struktural', $id)->update($data)){

                return response()->json(['sukses' => 'Data berhasil diupdated']);

            }
        }

        return redirect('/');

    }

    public function deleteData($id){
       
        if (StatusLogin::check()) {
            if ( Struktural::where('id_struktural', $id)->delete() ) {
                 return response()->json(['sukses' => 'Data berhasil dihapus']);
            }
        }
 
        return redirect('/');
 
     
    }
}
