<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    /* 
    *@ Option to Database
    */

    public $incrementing = false; 
    protected $table = 'tbl_user'; 
    protected $primaryKey = 'id_user';

    protected $keyType = 'string';
    protected $guarded = [];
    protected $attributes = [
        'aktif' => true,
    ];
}
