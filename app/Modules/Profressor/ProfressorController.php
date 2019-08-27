<?php
namespace App\Modules\Profressor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Hash;
use stdClass;
use App\Services\MyResponse;
class ProfressorController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $degr_id = $request->get('degr_id');
        $qua_id = $request->get('qua_id');
        $aca_id = $request->get('aca_id');
        $bra_id = $request->get('bra_id');
        $inst_id = $request->get('inst_id');

        $teacher = DB::table('teacher')
        ->select('teacher.*','degree.degr_name','qualification.qua_name','academic.aca_name','branch.bra_name','institution.inst_name')
        ->leftJoin('degree','teacher.degr_id','degree.degr_id')
        ->leftJoin('qualification','teacher.qua_id','qualification.qua_id')
        ->leftJoin('academic','teacher.aca_id','academic.aca_id')
        ->leftJoin('branch','teacher.bra_id','branch.bra_id')
        ->leftJoin('institution','teacher.inst_id','institution.inst_id')
        ->whereNull('teacher.deleted_at');

        if(!empty($keyword))
        {
            $teacher->where(function ($query) use($keyword){
                $query->where('first_name','LIKE','%'.$keyword.'%')
                      ->orWhere('last_name','LIKE','%'.$keyword.'%')
                      ->orWhere('email','LIKE','%'.$keyword.'%');
            });
        }
        
        if(is_numeric($degr_id))
        {
            $teacher->where('teacher.degr_id','=',$degr_id);
        }
        if(is_numeric($qua_id))
        {
            $teacher->where('teacher.qua_id','=',$qua_id);
        }
        if(is_numeric($aca_id))
        {
            $teacher->where('teacher.aca_id','=',$aca_id);
        }
        if(is_numeric($bra_id))
        {
            $teacher->where('teacher.bra_id','=',$bra_id);
        }
        if(is_numeric($inst_id))
        {
            $teacher->where('teacher.inst_id','=',$inst_id);
        }
    
        
        $teacher = $teacher->orderBy('teacher.first_name','asc')->paginate(10);
        $degree = DB::table('degree')->whereNull('deleted_at')->get();
        $qualification = DB::table('qualification')->whereNull('deleted_at')->get();
        $academic = DB::table('academic')->whereNull('deleted_at')->get();
        $branch = DB::table('branch')->whereNull('deleted_at')->get();
        $institution = DB::table('institution')->whereNull('deleted_at')->get();
        return view('pro::list',compact('teacher','degree','qualification','academic','branch','institution'));
    }
    public function create()
    {
        $degree = DB::table('degree')->whereNull('deleted_at')->get();
        $qualification = DB::table('qualification')->whereNull('deleted_at')->get();
        $academic = DB::table('academic')->whereNull('deleted_at')->get();
        $branch = DB::table('branch')->whereNull('deleted_at')->get();
        $institution = DB::table('institution')->whereNull('deleted_at')->get();
        return view('pro::form',compact('degree','qualification','academic','branch','institution'));
    }
    public function store(Request $request)
    {
        $firstname = $request->get('firstname');
        $lastname = $request->get('lastname');
        $gender = $request->get('gender');
        $email = $request->get('email');
        $degr_id = $request->get('degr_id');
        $qua_id = $request->get('qua_id');
        $aca_id = $request->get('aca_id');
        $bra_id = $request->get('bra_id');
        $inst_id = $request->get('inst_id');
        $detail = $request->get('detail');
        $username = $request->get('username');
        $password = $request->get('password');
      

        if(!empty($firstname) && !empty($username) && !empty($password) && !empty($lastname) && !empty($gender) && !empty($email) && is_numeric($degr_id) && is_numeric($aca_id) && is_numeric($bra_id) && is_numeric($inst_id) && is_numeric($qua_id))
        {
            $teacher = DB::table('teacher')
            ->where('first_name',$firstname)
            ->where('last_name',$lastname)
            ->whereNull('teacher.deleted_at')->first();
            if(!empty($teacher)){
                return MyResponse::error('ขออภัยข้อมูลนี้มีในระบบแล้วคะ');
            }
            $users = DB::table('users')
            ->where('username',$username)
            ->where('user_type','USER_LEVEL_TEACHER')
            ->where('status','Y')->first();
            if(!empty($users)){
                return MyResponse::error('Username นี้มีในระบบแล้ว');
            }
                
               $tea_id = DB::table('teacher')->insertGetId([
                    'first_name' =>$firstname,
                    'last_name' =>$lastname,
                    'gender' =>$gender,
                    'email' =>$email,
                    'degr_id' =>$degr_id,
                    'qua_id' =>$qua_id,
                    'aca_id' =>$aca_id,
                    'bra_id' =>$bra_id,
                    'inst_id' =>$inst_id,
                    'detail' =>$detail,
                    'created_at' =>date('Y-m-d H:i:s'),
                ]);
                DB::table('users')
                ->insert([
                    'user_type' =>'USER_LEVEL_TEACHER',
                    'user_id' =>$tea_id,
                    'username' =>$username,
                    'password' =>Hash::make($password),
                    'created_at' =>date('Y-m-d H:i:s'),
                    'status' =>'Y'
                ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/profressor');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($tea_id,Request $request)
    {
        if(is_numeric($tea_id))
        {
            $profressor = DB::table('teacher')
            ->select('teacher.*','users.username')
            ->leftJoin('users', function ($join) use($tea_id) {
                $join->on('users.user_id', '=', 'teacher.tea_id')
                     ->where('user_type','USER_LEVEL_TEACHER')
                     ->where('status','Y');
            })
            ->where('tea_id',$tea_id)->first();
            if(!empty($profressor))
            {
                $degree = DB::table('degree')->whereNull('deleted_at')->get();
                $qualification = DB::table('qualification')->whereNull('deleted_at')->get();
                $academic = DB::table('academic')->whereNull('deleted_at')->get();
                $branch = DB::table('branch')->whereNull('deleted_at')->get();
                $institution = DB::table('institution')->whereNull('deleted_at')->get();
                return view('pro::form',[
                    'profressor'=>$profressor,
                    'degree'=>$degree,
                    'qualification'=>$qualification,
                    'academic'=>$academic,
                    'branch'=>$branch,
                    'institution'=>$institution
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/profressor']);
    }
    
    public function update($tea_id,Request $request)
    {
        if(is_numeric($tea_id))
        {
            $firstname = $request->get('firstname');
            $lastname = $request->get('lastname');
            $gender = $request->get('gender');
            $email = $request->get('email');
            $degr_id = $request->get('degr_id');
            $qua_id = $request->get('qua_id');
            $aca_id = $request->get('aca_id');
            $bra_id = $request->get('bra_id');
            $inst_id = $request->get('inst_id');
            $detail = $request->get('detail');
            $username = $request->get('username');
            $password = $request->get('password');


            if(!empty($firstname) && !empty($lastname) && !empty($gender) && !empty($email) && is_numeric($degr_id) && is_numeric($aca_id) && is_numeric($bra_id) && is_numeric($inst_id) && is_numeric($qua_id))
            {
                $teacher = DB::table('teacher')
            ->where('tea_id','!=',$tea_id)
            ->where('first_name',$firstname)
            ->where('last_name',$lastname)
            ->whereNull('deleted_at')->first();
            if(!empty($teacher)){
                return MyResponse::error('ขออภัยข้อมูลนี้มีในระบบแล้วคะ');
            }
                DB::table('teacher')->where('tea_id',$tea_id)->update([
                    'first_name' =>$firstname,
                    'last_name' =>$lastname,
                    'gender' =>$gender,
                    'email' =>$email,
                    'degr_id' =>$degr_id,
                    'qua_id' =>$qua_id,
                    'aca_id' =>$aca_id,
                    'bra_id' =>$bra_id,
                    'inst_id' =>$inst_id,
                    'detail' =>$detail,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                if(!empty($username)){
                    $users = DB::table('users')
                        ->where('username',$username)
                        ->where('user_type','USER_LEVEL_TEACHER')
                        ->where('user_id','!=',$tea_id)
                        ->where('status','Y')->first();
                        if(!empty($users)){
                            return MyResponse::error('Username นี้มีในระบบแล้ว');
                        }else{
                            DB::table('users')
                            ->where('user_type','USER_LEVEL_TEACHER')
                            ->where('user_id',$tea_id)
                            ->where('user_type','USER_LEVEL_TEACHER')
                            ->where('status','Y')
                            ->update([
                                'username' =>$username,
                                'password' =>Hash::make($password)
                            ]);
                        }
                }
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/profressor');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($tea_id)
    {
        if(is_numeric($tea_id))
        {
            DB::table('teacher')->where('tea_id',$tea_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}