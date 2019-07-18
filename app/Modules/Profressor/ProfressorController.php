<?php

namespace App\Modules\Profressor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
class ProfressorController extends Controller
{
    public function index(Request $request)
    {
        $teacher = DB::table('teacher')->paginate(5);
        return view('pro::list',compact('teacher'));
    }
/*
    public function create()
    {
        return view('pro::form');
    }
*/
    public function editform($tea_id,Request $request)
    {
        if(is_numeric($tea_id))
        {
            $profressor = DB::table('teacher')->where('tea_id',$tea_id)->first();
            if(!empty($profressor))
            {
                return view('pro::form',[
                    'profressor'=>$profressor
                ]);
            }
            else
            {
                echo 'Profressor not found!!!!!!';exit;
            }
        }
        echo 'Invalid!!!';exit;
    }
    
    public function action($tea_id,Request $request)
    {
        if(is_numeric($tea_id))
        {
            $firstname = $request->get('first_name');
            $lastname = $request->get('last_name');
            $gender = $request->get('gender');
            $email = $request->get('email');

            if(!empty($firstname) && !empty($lastname) && !empty($gender) && !empty($email))
            {
                DB::table('teacher')->where('tea_id',$tea_id)->update([
                    'firstname' =>$firstname,
                    'lastname' =>$lastname,
                    'gender' =>$gender,
                    'email' =>$email,
                ]);
                return redirect('/profressor/'.$tea_id);
            }
        }
        echo 'ID value!!!!';exit;
    }

    public function action_delete($tea_id)
    {
        if(is_numeric($tea_id))
        {
            DB::table('teacher')->where('tea_id',$tea_id)->delete();
            return redirect('/');
        }
    }
}