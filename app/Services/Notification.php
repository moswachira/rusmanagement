<?php

namespace App\Services;
use DB;
use App\Services\CurrentUser;
class Notification
{
    public static function get(){
        $currentuser = CurrentUser::user();
        $total =0;
        if($currentuser && CurrentUser::is_teacher()){
            $total = DB::table('assignment')
                ->where('tea_id',$currentuser->tea_id)->count();
                return '<a href="/assignment">มอบหมายงาน<span class="badge">'.$total.'</span></a>';
            }
      
        
    }
}