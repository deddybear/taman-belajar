<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    // * Option Database

    public $incrementing = false;
    protected $primaryKey = 'id_sekolah';
    protected $keyType = 'string';

    protected $table = 'tbl_sekolahan';
    protected $guarded = [];

    //* Relasi

    public function tbl_profile(){
        return $this->hasOne('App\Models\Profile');
    }
}
