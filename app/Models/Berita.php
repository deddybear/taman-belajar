<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model {
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'id_berita';
    protected $keyType = 'string';

    protected $table = 'tbl_berita';
    protected $guarded = [];

    public function tbl_user(){
        return $this->hasMany('App\Models\Users');
    }

    public function tbl_kategori(){
        return $this->hasMany('App\Models\Kategori');
    }
}
