<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StatusLogin extends Controller
{
    
    public static function check(){
        
        if (Session::has('aktif') && Session::has('username')) {

            return true;    
        
        } else {

            return false;

        }

    }
}
