<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'id_kategori';
    protected $keyType = 'string';

    protected $table = 'tbl_kategori';
    protected $guarded = [];
}
