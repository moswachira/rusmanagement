<?php
namespace App\Modules\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
use App\Services\CurrentUser;
class EducationController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $degr_id = $request->get('degr_id');
        $aca_id = $request->get('aca_id');
        $bra_id = $request->get('bra_id');
        $qua_id = $request->get('qua_id');
        $inst_id = $request->get('inst_id');

        $education = DB::table('education')
        ->select('education.*','degree.degr_name','branch.bra_name','institution.inst_name','teacher.first_name','teacher.last_name','qualification.qua_name')
        ->leftJoin('degree','education.degr_id','degree.degr_id')
        ->leftJoin('teacher','education.tea_id','teacher.tea_id')
        ->leftJoin('branch','education.bra_id','branch.bra_id')
        ->leftJoin('qualification','education.qua_id','qualification.qua_id')
        ->leftJoin('institution','education.inst_id','institution.inst_id')
        ->whereNull('education.deleted_at');

        if(!empty($keyword))
        {
            $education->where(function ($query) use($keyword){
                $query->where('thesis','LIKE','%'.$keyword.'%')
                      ->orWhere('date','LIKE','%'.$keyword.'%');
            });
        }
        
        if(is_numeric($degr_id))
        {
            $education->where('education.degr_id','=',$degr_id);
        }
        if(is_numeric($aca_id))
        {
            $education->where('education.aca_id','=',$aca_id);
        }
        if(is_numeric($bra_id))
        {
            $education->where('education.bra_id','=',$bra_id);
        }
        if(is_numeric($inst_id))
        {
            $education->where('education.inst_id','=',$inst_id);
        }
        if(is_numeric($qua_id))
        {
            $education->where('education.qua_id','=',$qua_id);
        }
        
        $education = $education->orderBy('education.thesis','asc')->paginate(10);
        $degree = DB::table('degree')->whereNull('deleted_at')->get();
        $branch = DB::table('branch')->whereNull('deleted_at')->get();
        $qualification = DB::table('qualification')->whereNull('deleted_at')->get();
        $institution = DB::table('institution')->whereNull('deleted_at')->get();
        $academic = DB::table('academic')->whereNull('deleted_at')->get();
        return view('edu::list',compact('education','degree','academic','branch','institution','qualification'));
    }
    public function create()
    {
        $currentuser = CurrentUser::user();
        $degree = DB::table('degree')->whereNull('deleted_at')->get();
        $branch = DB::table('branch')->whereNull('deleted_at')->get();
        $qualification = DB::table('qualification')->whereNull('deleted_at')->get();
        $institution = DB::table('institution')->whereNull('deleted_at')->get();
        $academic  = DB::table('academic')->whereNull('deleted_at')->get();
        $profressor = DB::table('teacher')
        ->leftJoin('academic','teacher.aca_id','academic.aca_id')
        ->leftJoin('degree','teacher.degr_id','degree.degr_id')
        ->leftJoin('branch','teacher.bra_id','branch.bra_id')
        ->leftJoin('qualification','teacher.qua_id','qualification.qua_id')
        ->leftJoin('institution','teacher.inst_id','institution.inst_id')
        ->where('tea_id','=',$currentuser->tea_id)->whereNull('teacher.deleted_at')->first();
        
        return view('edu::form',compact('degree','academic','branch','institution','qualification','profressor'));
    }
    public function store(Request $request)
    {
        $thesis = $request->get('thesis');
        $start_year = $request->get('start_year');
        $end_year = $request->get('end_year');
        $degr_id = $request->get('degr_id');
        $bra_id = $request->get('bra_id');
        $inst_id = $request->get('inst_id');
        $qua_id = $request->get('qua_id');
        $detail = $request->get('detail');
        $status = $request->get('status');
        $currentuser = CurrentUser::user();

        if(!empty($thesis)  && is_numeric($degr_id) && is_numeric($bra_id) && is_numeric($inst_id) && is_numeric($qua_id) && !empty($detail))
        {
                DB::table('education')->insert([
                    'thesis' =>$thesis,
                    'start_year' =>$start_year,
                    'end_year' =>$end_year,
                    'degr_id' =>$degr_id,
                    'bra_id' =>$bra_id,
                    'inst_id' =>$inst_id,
                    'qua_id' =>$qua_id,
                    'detail' =>$detail,
                    'status' =>$status,
                    'tea_id' =>$currentuser->tea_id,
                    'created_at' =>date('Y-m-d H:i:s'),
                ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/education');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($edu_id,Request $request)
    {
        if(is_numeric($edu_id))
        {
            $edus = DB::table('education')->where('edu_id',$edu_id)->first();
            if(!empty($edus))
            {
                $degree = DB::table('degree')->whereNull('deleted_at')->get();
                $branch = DB::table('branch')->whereNull('deleted_at')->get();
                $teacher = DB::table('teacher')->where('tea_id')->whereNull('deleted_at')->get();
                $qualification = DB::table('qualification')->whereNull('deleted_at')->get();
                $institution = DB::table('institution')->whereNull('deleted_at')->get();
                $academic = DB::table('academic')->whereNull('deleted_at')->get();
                $profressor = DB::table('teacher')
        ->leftJoin('academic','teacher.aca_id','academic.aca_id')
        ->leftJoin('degree','teacher.degr_id','degree.degr_id')
        ->leftJoin('branch','teacher.bra_id','branch.bra_id')
        ->leftJoin('qualification','teacher.qua_id','qualification.qua_id')
        ->leftJoin('institution','teacher.inst_id','institution.inst_id')
        ->where('tea_id','=',$edus->tea_id)->whereNull('teacher.deleted_at')->first();
                return view('edu::form',[
                    'edus'=>$edus,
                    'degree'=>$degree,
                    'branch'=>$branch,
                    'teacher'=>$teacher,
                    'qualification'=>$qualification,
                    'institution'=>$institution,
                    'academic'=>$academic,
                    'profressor'=>$profressor
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/education']);
    }
    
    public function update($edu_id,Request $request)
    {
        if(is_numeric($edu_id))
        {
            $thesis = $request->get('thesis');
            $start_year = $request->get('start_year');
            $end_year = $request->get('end_year');
            $degr_id = $request->get('degr_id');
            $bra_id = $request->get('bra_id');
            $inst_id = $request->get('inst_id');
            $qua_id = $request->get('qua_id');
            $detail = $request->get('detail');
            $status = $request->get('status');


            if(!empty($thesis) && is_numeric($degr_id) && is_numeric($bra_id) && is_numeric($inst_id) && is_numeric($qua_id) && !empty($start_year) && !empty($end_year) && !empty($detail))
            {
                DB::table('education')->where('edu_id',$edu_id)->update([
                    'thesis' =>$thesis,
                    'start_year' =>$start_year,
                    'end_year' =>$end_year,
                    'degr_id' =>$degr_id,
                    'bra_id' =>$bra_id,
                    'inst_id' =>$inst_id,
                    'qua_id' =>$qua_id,
                    'detail' =>$detail,
                    'status' =>$status,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/education');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($edu_id)
    {
        if(is_numeric($edu_id))
        {
            DB::table('education')->where('edu_id',$edu_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}