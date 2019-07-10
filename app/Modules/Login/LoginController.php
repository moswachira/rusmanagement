<?php

namespace App\Modules\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use MyConst;
use MyResponse;
use Hash;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        //echo Hash::make('123456789');exit;
        return view('login::login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function action(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $remember = $request->get('remember');
        if(empty($username)){
            return MyResponse::error('กรุณาป้อน Username ก่อนครับ');
        }
        if(empty($password)){
            return MyResponse::error('กรุณาป้อน Password ก่อนครับ');
        }
        $user = DB::table('users')
                ->where('username',$username)
                ->where('status','Y')
                ->first();
        if(empty($user)){
            return MyResponse::error('Username หรือ Password ผิดครับ');
        }
        if(Hash::check($password,$user->password)){
            Auth::loginUsingId($user->id, $remember);
            DB::table('users')
                ->where('id',$user->id)
                ->update(['last_login_at'=>date('Y-m-d H:i:s')]);
            return MyResponse::success('Login สำเร็จ');
        }
    }
}