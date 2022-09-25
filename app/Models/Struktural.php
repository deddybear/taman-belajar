<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struktural extends Model
{
    use HasFactory;

    //* Option Database

    public $incrementing = false;
    protected $primaryKey = 'id_skruktural';
    protected $keyType = 'string';

    protected $table = 'tbl_struktural';
    protected $guarded = [];

    //* Relasi

    public function tbl_sekolah(){
        return $this->belongsTo('App\Models\Sekolah');
    }
}
