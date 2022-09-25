<?php

namespace App\Http\Controllers;
use App\Http\Controllers\StatusLogin;
use Illuminate\Support\Facades\Validator;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileSekolahController extends Controller {
    
    public function homepage ($slug){
        //? Halaman untuk Pengunjung

        $data = Profile::select('isi_profile')->where('slug', $slug)->get()->first();
        return view('homepage/profile', compact('data'));
    
    }

    public function index (){
        # AdminPage

        if (StatusLogin::check()) {
            
            return view('admin/profile-sekolah');
        
        }

        return redirect('/');
    }

    public function dataProfile($idProfile){
        
        if (StatusLogin::check()) {
            
            $data = Profile::select('id_profile', 'isi_profile', 'updated_at')->where('id_profile', $idProfile)->get();

            return json_encode($data);
        }

    }

    public function updateProfile($idProfile, Request $request){
        
        if (StatusLogin::check()){

            $valid = Validator::make($request->all(), [
                'textprofile' => 'required'
            ]);

            if ($valid->fails()) {
                
                return response()->json(['error' => $valid->errors()->all()]);

            }

            $data = array(
                'isi_profile' => $request->textprofile
            );

            if(Profile::where('id_profile', '=', $idProfile)->update($data)){

                return response()->json(['sukses' => 'Profile Sekolahan Berhasil Diupdate']);
            
            }
        }

    }
}
