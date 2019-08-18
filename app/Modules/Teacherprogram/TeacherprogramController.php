<?php
namespace App\Modules\Teacherprogram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
use App\Services\CurrentUser;
class TeacherprogramController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $sub_id = $request->get('sub_id');
        $term_id = $request->get('term_id');
        $tea_id = $request->get('tea_id');
        $currentuser = CurrentUser::user();

        $teacherprogram = DB::table('teacherprogram')
        ->select('teacherprogram.*','subjects.sub_name','term.term_name','teacher.first_name','teacher.last_name')
        ->leftJoin('subjects','teacherprogram.sub_id','subjects.sub_id')
        ->leftJoin('teacher','teacherprogram.tea_id','teacher.tea_id')
        ->leftJoin('term','teacherprogram.term_id','term.term_id')
        ->whereNull('teacherprogram.deleted_at');
        if(!CurrentUser::is_admin()){
            $teacherprogram->where('teacher.tea_id',$currentuser->tea_id);
            }

        if(!empty($keyword))
        {
            $teacherprogram->where(function ($query) use($keyword){
                $query->where('subject','LIKE','%'.$keyword.'%')
                      ->orWhere('year','LIKE','%'.$keyword.'%');
            });
        }
        
        if(is_numeric($sub_id))
        {
            $teacherprogram->where('teacherprogram.sub_id','=',$sub_id);
        }
        if(is_numeric($term_id))
        {
            $teacherprogram->where('teacherprogram.term_id','=',$term_id);
        }
        if(is_numeric($tea_id))
        {
            $teacherprogram->where('teacherprogram.tea_id','=',$tea_id);
        }
        
        $teacherprogram = $teacherprogram->paginate(10);
        $subjects = DB::table('subjects')->whereNull('deleted_at')->get();
        $term = DB::table('term')->whereNull('deleted_at')->get();
        $teacher = DB::table('teacher')->whereNull('deleted_at')->get();
        return view('teapro::list',compact('teacherprogram','subjects','term','teacher'));
        
    }
     
    public function create()
    {
        $subjects = DB::table('subjects')->whereNull('deleted_at')->get();
        $term  = DB::table('term')->whereNull('deleted_at')->get();
        $teacher  = DB::table('teacher')->whereNull('deleted_at')->get();
        return view('teapro::form',compact('subjects','term','teacher'));
    }
    public function store(Request $request)
    {
        $sub_id = $request->get('sub_id');
        $term_id = $request->get('term_id');
        $tea_id = $request->get('tea_id');
        $currentuser = CurrentUser::user();

        if(is_numeric($sub_id) && is_numeric($term_id) && is_numeric($tea_id))
        {
                DB::table('teacherprogram')->insert([
                    'sub_id' =>$sub_id,
                    'term_id' =>$term_id,
                    'tea_id' =>$tea_id,
                    'created_at' =>date('Y-m-d H:i:s'),
                ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/teacherprogram');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($teapro_id,Request $request)
    {
        if(is_numeric($teapro_id))
        {
            $teacherprograms = DB::table('teacherprogram')->where('teapro_id',$teapro_id)->first();
            if(!empty($teacherprograms))
            {
                $subjects = DB::table('subjects')->whereNull('deleted_at')->get();
                $teacher = DB::table('teacher')->where('tea_id')->whereNull('deleted_at')->get();
                $term = DB::table('term')->whereNull('deleted_at')->get();
                $profressor = DB::table('teacher')
                ->where('tea_id','=',$teacherprograms->tea_id)->whereNull('teacher.deleted_at')->first();
                return view('teapro::form',[
                    'teacherprograms'=>$teacherprograms,
                    'subjects'=>$subjects,
                    'term'=>$term,
                    'profressor'=>$profressor,
                    'teacher'=>$teacher,
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/teacherprogram']);
    }
    
    public function update($teapro_id,Request $request)
    {
        if(is_numeric($teapro_id))
        {
            $sub_id = $request->get('sub_id');
            $term_id = $request->get('term_id');


            if(is_numeric($sub_id) && is_numeric($term_id))
            {
                DB::table('teacherprogram')->where('teapro_id',$teapro_id)->update([
                    'sub_id' =>$sub_id,
                    'term_id' =>$term_id,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/teacherprogram');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($teapro_id)
    {
        if(is_numeric($teapro_id))
        {
            DB::table('teacherprogram')->where('teapro_id',$teapro_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}