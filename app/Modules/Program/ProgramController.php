<?php
namespace App\Modules\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
use App\Services\CurrentUser;
class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $term_id = $request->get('term_id');
        $sub_id = $request->get('sub_id');
        $currentuser = CurrentUser::user();

        $program = DB::table('program')
        ->select('program.*','term.termn','subjects.sub_name','term.year')
        ->leftJoin('term','term.term_id','program.term_id')
        ->leftJoin('subjects','subjects.sub_id','program.sub_id')
        ->leftJoin('teacher','program.tea_id','teacher.tea_id')
        ->whereNull('program.deleted_at');
        if(!CurrentUser::is_admin()){
            $program->where('teacher.tea_id',$currentuser->tea_id);
            }
        
        if(is_numeric($term_id))
        {
            $program->where('program.term_id','=',$term_id);
        }
        if(is_numeric($sub_id))
        {
            $program->where('program.sub_id','=',$sub_id);
        }

        $program = $program->paginate(10);     
        $term = DB::table('term')->whereNull('deleted_at')->get();
        $subjects = DB::table('subjects')->whereNull('deleted_at')->get();
        return view('prog::list',compact('program','term','subjects'));
    }
    public function create()
    {
        $term = DB::table('term')->whereNull('deleted_at')->get();
        $subjects = DB::table('subjects')->whereNull('deleted_at')->get();
        return view('prog::form',compact('term','subjects'));
    }
    public function store(Request $request)
    {
        $term_id = $request->get('term_id');
        $sub_id = $request->get('sub_id');
        $currentuser = CurrentUser::user();

        if(is_numeric($term_id) && is_numeric($sub_id))
        {
            DB::table('program')->insert([
                'term_id' =>$term_id,
                'sub_id' =>$sub_id,
                'created_at' =>date('Y-m-d H:i:s'),
                'tea_id' =>$currentuser->tea_id,


            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/program');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($program_id,Request $request)
    {
        if(is_numeric($program_id))
        {
            $programs = DB::table('program')->where('program_id',$program_id)->first();
            if(!empty($programs))
            {
                return view('prog::form',[
                    'programs'=>$programs,
                    'terms'=>$terms,
                    'subjects'=>$subjects
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/program']);
    }
    
    public function update($program_id,Request $request)
    {
        if(is_numeric($program_id))
        {
            $termn = $request->get('termn');
            $year = $request->get('year');
            $sub_name = $request->get('sub_name');

            if(!empty($termn) && !empty($year) && !empty($sub_name))
            {
                DB::table('program')->where('program_id',$program_id)->update([
                    'termn' =>$termn,
                    'year' =>$year,
                    'sub_name' =>$sub_name,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/program');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($program_id)
    {
        if(is_numeric($program_id))
        {
            DB::table('program')->where('program_id',$program_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}