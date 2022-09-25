<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    //* Option Database

    public $incrementing = false;
    protected $primaryKey = 'id_siswa';
    protected $keyType = 'string';

    protected $table = 'tbl_data_siswa';
    protected $guarded = [];

    //* Relasi
    public function tbl_sekolahan(){
        return $this->hasMany('App\Models\Sekolah');
    }
}
