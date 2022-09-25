<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid as Generate;
use Illuminate\Validation\Rule;

class AccountController extends Controller{
    
    /**
    
    * *@ List Fungsi Halaman Website
     
    * TODO: Fungsi Account 
    
    */

    public function registerAdmin(Request $request){
    
        $request->validate([
            'nama'         => 'required|string',
            'username'     => 'required|unique:tbl_user,username|min:5|max:12|alpha_dash',
            'password'     => 'required|min:5|alpha_dash',
            'confrimation' => 'required|min:5|same:password|alpha_dash'
        ]);
    
        User::create([
            'id_user' => Generate::uuid4(),
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
        ]);
    
        return redirect('/panel-admin/login')->with('success', 'Berhasil mendaftar Silahkan Login');       
    
    }

    public function loginAdmin(Request $request){
        
        $request->validate(([
            'username' => 'required|max:12|min:5|alpha_dash',
            'password' => 'required|min:5|alpha_dash',
        ]));
         
        if ($request->session()->has('aktif') && $request->session()->has('username')) {
            
            return redirect('/panel-admin/dashboard')->with('error', 'Anda sudah berstatus login !');

        } else {

            if($dataAccount = User::where('username', $request->username)->first()){

                if(password_verify($request->password, $dataAccount["password"]) && $dataAccount["aktif"] == "1"){
                    
                    $request->session()->put($dataAccount->toArray());
                    return redirect('/panel-admin/dashboard');
                
                }
            }

        }

        return redirect('/panel-admin/login')->with('error', 'Password Atau Username Salah');  
    }

    public function editAccountAdmin(Request $request){
    
       date_default_timezone_set("Asia/Jakarta");
       
       $targetUsername = $request->session()->get('username');
       
       if ($dataAccount = User::where('username', $targetUsername)->first()) {
       
            $request->validate([
                'username'     => 'required|min:5|max:10|alpha_dash', Rule::unique('tbl_user', 'username')->ignore($dataAccount['id_users']),
                'nama'         => 'required|min:5|max:50|alpha_dash',
                'oldpassword'  => 'required|min:5|alpha_dash',
                'newpassword'  => 'required|min:5|alpha_dash',
                'confrimation' => 'required|min:5|same:newpassword|alpha_dash'
            ]);

            if (password_verify($request->oldpassword, $dataAccount["password"])) {
               
               $request->session()->flush();
               
               $data = array(
                'username' => $request->username,
                'nama'     => $request->nama,
                'password' => Hash::make($request->newpassword)
                );

               User::where('username', $targetUsername)->update($data);
               
               $newData = User::where('username', $request->username)->first();
               $request->session()->put($newData->toArray());
       
               return redirect('/panel-admin/edit-account')->with('success', 'Berhasil mengupdate data akun'); 
               
            } 
            
            return redirect('/panel-admin/edit-account')->with('error', 'Password lama salah');
       }

       return redirect('/panel-admin/edit-account')->with('error', 'Data User tidak diketahui coba sekali lagi');

    }

    public function logoutAdmin(Request $request){

        $request->session()->flush();
        return redirect('/');

    }


    /** 
    
    * TODO: End Fungsi Account 
    
    */

}
