<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    //* Option Database

    public $incrementing = false;
    protected $primaryKey = 'id_profile';
    protected $keyType = 'string';

    protected $table = 'tbl_profile';
    protected $guarded = [];

}
