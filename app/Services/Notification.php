<?php

namespace App\Services;
use DB;
class Notification
{
    public static function get(){
        $total = DB::table('assignment')->count();
        return '<a href="#">News <span class="badge">'.$total.'</span></a>';
    }
}