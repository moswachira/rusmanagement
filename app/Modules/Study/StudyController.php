<?php
namespace App\Modules\Study;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
use App\Services\CurrentUser;
class StudyController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $sour_id = $request->get('sour_id');
        $sout_id = $request->get('sout_id');
        $currentuser = CurrentUser::user();

        $research = DB::table('research')
        ->select('research.*','soure.sour_name','souretype.sout_name','teacher.first_name','teacher.last_name')
        ->leftJoin('soure','research.sour_id','soure.sour_id')
        ->leftJoin('teacher','research.tea_id','teacher.tea_id')
        ->leftJoin('souretype','research.sout_id','souretype.sout_id')
        ->whereNull('research.deleted_at');
        if(!CurrentUser::is_admin()){
            $research->where('teacher.tea_id',$currentuser->tea_id);
            }

        if(!empty($keyword))
        {
            $research->where(function ($query) use($keyword){
                $query->where('subject','LIKE','%'.$keyword.'%')
                      ->orWhere('year','LIKE','%'.$keyword.'%');
            });
        }
        
        if(is_numeric($sour_id))
        {
            $research->where('research.sour_id','=',$sour_id);
        }
        if(is_numeric($sout_id))
        {
            $research->where('research.sout_id','=',$sout_id);
        }
        
        $research = $research->orderBy('research.subject','asc')->paginate(10);
        $soure = DB::table('soure')->whereNull('deleted_at')->get();
        $souretype = DB::table('souretype')->whereNull('deleted_at')->get();
        return view('stu::studylist',compact('research','soure','souretype'));
        
    }
     
    public function create()
    {
        $soure = DB::table('soure')->whereNull('deleted_at')->get();
        $souretype  = DB::table('souretype')->whereNull('deleted_at')->get();
        return view('stu::studyform',compact('soure','souretype'));
    }
    public function store(Request $request)
    {
        $subject = $request->get('subject');
        $year = $request->get('year');
        $sour_id = $request->get('sour_id');
        $sout_id = $request->get('sout_id');
        $detail = $request->get('detail');
        $currentuser = CurrentUser::user();

        if(!empty($subject) && !empty($year)  && is_numeric($sour_id) && is_numeric($sout_id) && !empty($detail))
        {
                DB::table('research')->insert([
                    'subject' =>$subject,
                    'year' =>$year,
                    'sour_id' =>$sour_id,
                    'sout_id' =>$sout_id,
                    'detail' =>$detail,
                    'tea_id' =>$currentuser->tea_id,
                    'created_at' =>date('Y-m-d H:i:s'),
                ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/study');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($res_id,Request $request)
    {
        if(is_numeric($res_id))
        {
            $studys = DB::table('research')->where('res_id',$res_id)->first();
            if(!empty($studys))
            {
                $soure = DB::table('soure')->whereNull('deleted_at')->get();
                $souretype = DB::table('souretype')->whereNull('deleted_at')->get();
                return view('stu::studyform',[
                    'studys'=>$studys,
                    'soure'=>$soure,
                    'souretype'=>$souretype
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/study']);
    }
    
    public function update($res_id,Request $request)
    {
        if(is_numeric($res_id))
        {
            $subject = $request->get('subject');
            $year = $request->get('year');
            $sour_id = $request->get('sour_id');
            $sout_id = $request->get('sout_id');
            $detail = $request->get('detail');


            if(!empty($subject) && !empty($year)  && is_numeric($sour_id) && is_numeric($sout_id) && !empty($detail))
            {
                DB::table('research')->where('res_id',$res_id)->update([
                    'subject' =>$subject,
                    'year' =>$year,
                    'sour_id' =>$sour_id,
                    'sout_id' =>$sout_id,
                    'detail' =>$detail,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/study');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($res_id)
    {
        if(is_numeric($res_id))
        {
            DB::table('research')->where('res_id',$res_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}