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
            ->whereExists(function ($query) use($currentuser){
                $query->select(DB::raw(1))
                      ->from('assignment_teacher')
                      ->whereRaw('assignment_teacher.ass_id = assignment.ass_id')
                      ->where('assignment_teacher.tea_id',$currentuser->tea_id);
            })->count();
                return '<a href="/assignment" style="size:50px;"><i class="glyphicon glyphicon-list-alt">มอบหมายงาน<span class="badge">'.$total.'</i></span></a>';
            }
      
        
    }
}