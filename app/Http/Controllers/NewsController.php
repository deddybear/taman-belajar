<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Http\Controllers\StatusLogin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Uuid as Generate;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller {
    
    public function listArticle($category){

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
                            ->where('tbl_berita.id_kategori', $category)
                            ->paginate(5);

        return view('homepage/show-list-artikel', compact('data'));
    }

    public function showArticle($category, $slug){
        
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
                            ['tbl_berita.id_kategori', '=', $category],
                            ['tbl_berita.slug', '=', $slug],                                
                        ])
                        ->get()->first();

        return view('homepage/show-artikel', compact('data'));
    }

    public function index(){
        
        if (StatusLogin::check()) {
                        
            return view('admin/berita');
        }

        return redirect('/');
    }

    public function data(){

        if (StatusLogin::check()) {
        
            $data = Berita::select('*', 'tbl_kategori.nama')
                            ->join('tbl_kategori', 'tbl_kategori.id_kategori', 'tbl_berita.id_kategori') 
                            ->where('tbl_berita.id_kategori', '!=', 'S1')                         
                            ->get();
            return json_encode($data);
        }
    }

    public function addNews(Request $request){
        
        if(StatusLogin::check()){

            // default sampul berita
            $image_name = 'images/artikel/default.jpg';

            $valid = Validator::make($request->all(),[
                'namaberita' => 'required|unique:tbl_berita,judul_berita',
                'kategori'   => 'required',
                'news'       => 'required'
             ]);
     
             if($valid->fails()){
     
                 return response()->json(['error' => $valid->errors()->all()]);
             
             }
             
             $idBerita = Generate::uuid4();
             
             //* Set-up path images
             if ($request->kategori == "A1") {
     
                 $type_path = $request->type;
                 $path_name = 'images/artikel/sekolahan/'.$type_path.'/'.$idBerita.'/';
     
             } elseif ($request->kategori == "A2") {
     
                 $type_path = $request->type;
                 $path_name = 'images/artikel/siswa/'.$type_path.'/'.$idBerita.'/';
     
             } else {
             
                 $type_path = 'guru';
                 $path_name = 'images/artikel/'.$type_path.'/'.$idBerita.'/';
     
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
                     if(!is_dir($path_name)){
                         mkdir($path_name, 0777, true);
                     }
                     file_put_contents($path, $data);
     
     
                     $image->removeAttribute('src');
                     $image->setAttribute('src', '/'. $image_name);
                 }
     
                 $news = $dom->savehtml();
             }

     
             Berita::create([
                 'id_berita'   => $idBerita,
                 'id_user'     => $request->session()->get('id_user'),
                 'id_kategori' => $request->kategori,
                 'judul_berita'=> $request->namaberita,
                 'sampul_berita' => '/'. $image_name,
                 'isi_berita'  => $news,
                 'slug'        => Str::slug($request->namaberita, '-'),
                 'type_berita' => $type_path
             ]);
     
             return response()->json(['sukses' => 'Data berhasil diupload']);

        }
    
    }

    public function selectNews($id){
        
        if (StatusLogin::check()){

            // default sampul berita
            

            $data = Berita::where('id_berita', $id)->get();
            return json_encode($data);
        }
        
    }

    public function updateNews(Request $request, $id){
        
        if (StatusLogin::check()){

            $image_name = 'images/artikel/default.jpg';

            $valid = Validator::make($request->all(),[
                'namaberita' => 'required|unique:tbl_berita,judul_berita',
                'kategori'   => 'required',
                'news'       => 'required'
             ]);
     
            if($valid->fails()){
     
                return response()->json(['error' => $valid->errors()->all()]);
             
            }
    
            if ($request->kategori == "A1") {
    
                $type_path = $request->type;
                $path_name = 'images/artikel/sekolahan/'.$type_path.'/'.$id.'/';
                
                if(File::exists('images/artikel/sekolahan/'.$type_path.'/'.$id)){
                    File::deleteDirectory('images/artikel/sekolahan/'.$type_path.'/'.$id);
                }
    
            } elseif ($request->kategori == "A2") {
    
                $type_path = $request->type;
                $path_name = 'images/artikel/siswa/'.$type_path.'/'.$id.'/';
                
                if(File::exists('images/artikel/siswa/'.$type_path.'/'.$id)){
                    File::deleteDirectory('images/artikel/siswa/'.$type_path.'/'.$id);
                }
                
            } else {
            
                $type_path = null;
                $path_name = 'images/artikel/guru/'.$type_path.'/'.$id.'/';
                
                if(File::exists('images/artikel/guru/'.$type_path.'/'.$id)){
                    File::deleteDirectory('images/artikel/guru/'.$type_path.'/'.$id);
                }
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
                    if(!is_dir($path_name)){
                        mkdir($path_name, 0777, true);
                    }
                    file_put_contents($path, $data);
    
    
                    $image->removeAttribute('src');
                    $image->setAttribute('src','/'. $image_name);
                }
    
                $news = $dom->savehtml();
            }
    
            $data = array(
                'id_user'     => $request->session()->get('id_user'),
                'id_kategori' => $request->kategori,
                'judul_berita'=> $request->namaberita,
                'sampul_berita' => '/'. $image_name,
                'isi_berita'  => $news,
                'slug'        => Str::slug($request->namaberita, '-'),
                'type_berita' => $type_path
            );
    
            if(Berita::where('id_berita', '=', $id)->update($data)){
    
                return response()->json(['sukses' => 'Artikel Berhasil dirubah']);
            }

        }   

    }

    public function deleteNews($id){

        if (StatusLogin::check()) {
            $data = Berita::select('id_kategori', 'type_berita')->where('id_berita', $id)->get()->first();
            
            if($data->id_kategori == 'A1'){
                
                $path = 'images/artikel/sekolahan/'.$data->type_berita.'/'.$id;
                
            } else if($data->id_kategori == 'A2'){
                
                $path = 'images/artikel/siswa/'.$data->type_berita.'/'.$id;
                
            } else {
                
                $path = 'images/artikel/'.$data->type_berita.'/'.$id;
                
            }
            
            if (Berita::where('id_berita', $id)->delete()) {
                if(File::exists($path) && File::deleteDirectory($path)){
                    return response()->json(['sukses' => 'Data & File berhasil dihapus']);
                } else {
                   return response()->json(['sukses' => 'Data berhasil dihapus']); 
                } 
                    
            }
        }

    }


}
