<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Controllers\StatusLogin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid as Generate;


class GalleryController extends Controller {
    
    // TODO: Fungsi Website Gallery Foto

    public function homepage(){
        //? Halaman untuk pengunjung

        if (url()->current() == url('/gallery-photo')) {
        
            $data = Gallery::where('id_kategori', 'G1')->get();
            return view('homepage/gallery-photo', compact('data'));

        } else {

            $data = Gallery::select('link')->where('id_kategori', 'G2')->get();
            return view('homepage/gallery-video', compact('data'));

        }

    }

    public function index(){
        # AdminPage
        if (StatusLogin::check()) {
        
            return view('admin/upload-foto');
        
        }

        return redirect('/');
        
    }

    public function dataFoto(){

        if(StatusLogin::check()){

            $data = Gallery::select(
                'tbl_gallery.id_gallery', 
                'tbl_user.nama', 
                'tbl_gallery.judul', 
                'tbl_gallery.keterangan', 
                'tbl_gallery.link', 
                'tbl_gallery.created_at')
                ->join('tbl_user', 'tbl_user.id_user', '=', 'tbl_gallery.id_user')
                ->where('id_kategori', '=', 'G1')
                ->get();
           
            return json_encode($data);
        }
    }

    public function uploadFoto (Request $request){

        if (StatusLogin::check()) {

            $genName = '0123456789abcdefghijklmnopqrstuvwxyz';
            
            $valid = Validator::make($request->all(), [
                'judul'      => 'required|string|max:30',
                'keterangan' => 'required|string|min:5',
                'image'      => 'required|mimes:jpeg,png,jpg,gif,svg|max:2096'
            ]);
            
            if($valid->fails()){

                return response()->json(['error' => $valid->errors()->all()]);
            
            }

            $image = $request->file('image');
            
            $newName = substr(str_shuffle($genName), 0, 7). '.' .$image->getClientOriginalExtension();
            
            $image->move('images/gallery-photo/', $newName);
            
            Gallery::create([
                'id_gallery'  => Generate::uuid4(),
                'id_user'     => $request->session()->get('id_user'),
                'id_kategori' => 'G1',
                'judul'       => $request->judul,
                'keterangan'  => $request->keterangan,
                'link'        => $newName
            ]);

            return response()->json(['sukses' => 'Data berhasil diupload']);
        }

        return redirect('/');
    }

    public function deleteFoto ($id){

        if (StatusLogin::check()){

            $targetFile = Gallery::select('link')->where('id_gallery',$id)->first();
       
            if (Gallery::select('link')->where('id_gallery',$id)->delete()) {
                
                File::delete('images/gallery-photo/'.$targetFile["link"]);
                return response()->json(['sukses' => 'Data & File berhasil dihapus']);
        
            } 

        }

        
    }

    // TODO: Fungsi Webpage Gallery video
    
    public function pageVideo(){
        
        if (StatusLogin::check()) {
            return view('admin/upload-video');
        }

        redirect('/');
    }

    public function dataLink(){
        
        if (StatusLogin::check()) {
            $data = Gallery::select(
                'tbl_gallery.id_gallery', 
                'tbl_user.nama', 
                'tbl_gallery.judul', 
                'tbl_gallery.keterangan', 
                'tbl_gallery.link', 
                'tbl_gallery.created_at')
                ->join('tbl_user', 'tbl_user.id_user', '=', 'tbl_gallery.id_user')
                ->where('id_kategori', '=', 'G2')
                ->get();
           
                return json_encode($data);    
        }       
            redirect('/');
    }

    public function addLink(Request $request){
        
        if (StatusLogin::check()) {
            
                $valid = Validator::make($request->all(), [
                    'judul'      => 'required|string|max:30',
                    'keterangan' => 'required|string|min:5',
                    'link'       => 'required|string'
                ]);

                if($valid->fails()){

                    return response()->json(['error' => $valid->errors()->all()]);
            
                }

                Gallery::create([
                    'id_gallery' => Generate::uuid4(),
                    'id_user'     => $request->session()->get('id_user'),
                    'id_kategori' => 'G2',
                    'judul'       => $request->judul,
                    'keterangan'  => $request->keterangan,
                    'link'        => $request->link
                ]);

                return response()->json(['sukses' => 'Embed Link berhasil ditambah']);
        }

        return redirect('/');
    }

    public function selectLink($id){
        
        if (StatusLogin::check()) {
            
            $data = Gallery::where('id_gallery', '=', $id)->get();
            return json_encode($data);
        }

        return redirect('/');
    }

    public function updateLink(Request $request, $id){
        
        if(StatusLogin::check()){

            $valid = Validator::make($request->all(), [
                'judul'      => 'required|string|max:30',
                'keterangan' => 'required|string|min:5',
                'link'       => 'required|string'
            ]);
            
            if($valid->fails()){

                return response()->json(['error' => $valid->errors()->all()]);
            
            }

            $data = array(           
                'id_user'     => $request->session()->get('id_user'),
                'id_kategori' => 'G2',
                'judul'       => $request->judul,
                'keterangan'  => $request->keterangan,
                'link'        => $request->link
            );

            if(Gallery::where('id_gallery', '=', $id)->update($data)){

                return response()->json(['sukses' => 'Data link video berhasil diupdate']);
            
            }
        }

        return redirect('/');

    }

    public function deleteLink($id){
        if (StatusLogin::check()) {

            if (Gallery::where('id_gallery', $id)->delete()) {
                    return response()->json(['sukses' => 'Data berhasil dihapus']);
            }
        }

        return redirect('/');
        
    }
}
