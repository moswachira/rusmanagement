<?php
namespace App\Modules\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $term_id = $request->get('term_id');
        $sub_id = $request->get('sub_id');

        $program = DB::table('program')
        ->select('program.*','term.term_name','subjects.sub_name')
        ->leftJoin('term','term.term_id','program.term_id')
        ->leftJoin('subjects','subjects.sub_id','program.sub_id')
        ->whereNull('program.deleted_at');
        
        if(is_numeric($term_id))
        {
            $program->where('program.term_id','=',$term_id);
        }
        if(is_numeric($sub_id))
        {
            $program->where('program.sub_id','=',$sub_id);
        }

        $program = $program->get();     
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

        if(is_numeric($term_id) && is_numeric($sub_id))
        {
            DB::table('program')->insert([
                'term_id' =>$term_id,
                'sub_id' =>$sub_id,
                'created_at' =>date('Y-m-d H:i:s'),
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
                    'term'=>$term,
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
            $term_id = $request->get('term_id');
            $sub_id = $request->get('sub_id');

            if(is_numeric($term_id) && is_numeric($sub_id))
            {
                DB::table('program')->where('program_id',$program_id)->update([
                    'term_id' =>$term_id,
                    'sub_id' =>$sub_id,
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