<?php

namespace App\Services;
use Auth;
use DB;
use MyConst;
class CurrentUser
{
    public static function user(){
        if(Auth::check()){
            $user = Auth::user();
            if($user->user_type===MyConst::$USER_LEVEL_ADMIN){
                $admin = DB::table('admin')
                            ->where('id',$user->user_id)
                            ->first();
                return $admin;
            }
            elseif($user->user_type===MyConst::$USER_LEVEL_TEACHER){
                $admin = DB::table('teacher')
                            ->where('tea_id',$user->user_id)
                            ->first();
                return $admin;
            }
        }
        return null;
        
    }
    public static function menu(){
        if(Auth::check()){
            $user = Auth::user();
            if($user->user_type===MyConst::$USER_LEVEL_ADMIN){
                return view('menu-admin');
            }
            elseif($user->user_type===MyConst::$USER_LEVEL_TEACHER){
                $teacher = DB::table('teacher')
                            ->where('tea_id',$user->user_id)
                            ->first();
                if($teacher->right_id==1){
                    return view('menu-profressor');
                }elseif($teacher->right_id==2){
                    return view('menu-responsible');
                }elseif($teacher->right_id==3){
                    return view('menu-chief');
                }
            }
        }
        return null;
        
    }
    public static function permission($per=[]){
        if(Auth::check()){
            $user = Auth::user();
            if($user->user_type===MyConst::$USER_LEVEL_ADMIN){
                return true;
            }
            elseif($user->user_type===MyConst::$USER_LEVEL_TEACHER){
                $teacher = DB::table('teacher')
                            ->where('tea_id',$user->user_id)
                            ->first();
                    return in_array($teacher->right_id,$per);
            }
        }
        return false;
    }
}