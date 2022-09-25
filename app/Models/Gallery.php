<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    /* 
    *@ Option to Database
    */

    public $incrementing = false;
    protected $primaryKey = 'id_user';
    protected $keyType = 'string';

    protected $table = 'tbl_gallery';
    protected $guarded = [];


    //* Relasi
    public function tbl_user(){
        return $this->hasMany('App\Models\Users');
    }

    public function tbl_kategori(){
        return $this->hasMany('App\Models\Kategori');
    }
}
