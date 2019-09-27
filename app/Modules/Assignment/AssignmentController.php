<?php
namespace App\Modules\Assignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
use App\Services\CurrentUser;
class AssignmentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $currentuser = CurrentUser::user();

        $assignments = DB::table('assignment')
        ->select('assignment.*')
        ->whereNull('assignment.deleted_at');
        if(!CurrentUser::is_admin() && !CurrentUser::is_chief()){
            $assignments->whereExists(function ($query) use($currentuser){
                $query->select(DB::raw(1))
                      ->from('assignment_teacher')
                      ->whereRaw('assignment_teacher.ass_id = assignment.ass_id')
                      ->where('assignment_teacher.tea_id',$currentuser->tea_id);
            });
            }

        if(!empty($keyword))
        {
            $assignments->where(function ($query) use($keyword){
                $query->where('subject','LIKE','%'.$keyword.'%')
                      ->orWhere('year','LIKE','%'.$keyword.'%');
            });
        }
        
        

        $assignments = $assignments->orderBy('assignment.ass_name','asc')->paginate(10);
        $teacher = DB::table('teacher')->whereNull('deleted_at')->get();

        return view('ass::list',compact('assignments','teacher'));
        
    }
     
    public function create()
    {
        $teacher = DB::table('teacher')->whereNull('deleted_at')->get();
        return view('ass::form',compact('teacher'));
    }
    public function store(Request $request)
    {
        $ass_name = $request->get('ass_name');
        $start_time = $request->get('start_time');
        $end_time = $request->get('end_time');
        $detail = $request->get('detail');
        $place = $request->get('place');
        $tea_id = $request->get('tea_id');
        $assingmentfile = $request->get('assingmentfile');
        $currentuser = CurrentUser::user();
        if(!empty($ass_name) && is_array($tea_id) && !empty($start_time)  && !empty($end_time) && !empty($detail) && !empty($place))
        {
                $ass_id = DB::table('assignment')->insertGetId([
                    'ass_name' =>$ass_name,
                    'start_time' =>$start_time,
                    'end_time' =>$end_time,
                    'detail' =>$detail,
                    'place' =>$place,
                    'assingmentfile' =>$assingmentfile,
                    'created_at' =>date('Y-m-d H:i:s'),
                ]);
                foreach($tea_id as $id){
                    DB::table('assignment_teacher')->insert([
                    'tea_id' =>$id,
                    'ass_id' =>$ass_id,
                    ]);
                }
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/assignment');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($ass_id,Request $request)
    {
        if(is_numeric($ass_id))
        {
            $teacher = DB::table('teacher')->whereNull('deleted_at')->get();
            $assignments = DB::table('assignment')->where('ass_id',$ass_id)->first();
            $assignment_teacher = DB::table('assignment_teacher')->where('ass_id',$ass_id)->get();
            $teacher_selected = [];
            foreach($assignment_teacher as $row){
                $teacher_selected[]=$row->tea_id;
            }
            if(!empty($assignments))
            {
                return view('ass::form',[
                    'assignments'=>$assignments,
                    'teacher'=>$teacher,
                    'teacher_selected'=>$teacher_selected,
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/assignment']);
    }
    
    public function update($ass_id,Request $request)
    {
        if(is_numeric($ass_id))
        {
            $ass_name = $request->get('ass_name');
            $start_time = $request->get('start_time');
            $end_time = $request->get('end_time');
            $detail = $request->get('detail');
            $place = $request->get('place');
            $tea_id = $request->get('tea_id');

            if(!empty($ass_name) && is_array($tea_id) && !empty($start_time)  && !empty($end_time) && !empty($detail) && !empty($place))
            {
                DB::table('assignment')->where('ass_id',$ass_id)->update([
                    'ass_name' =>$ass_name,
                    'start_time' =>$start_time,
                    'end_time' =>$end_time,
                    'detail' =>$detail,
                    'place' =>$place,
                    'created_at' =>date('Y-m-d H:i:s'),
                ]);
                DB::table('assignment_teacher')->where('ass_id',$ass_id)->delete();
                foreach($tea_id as $id){
                    DB::table('assignment_teacher')->insert([
                    'tea_id' =>$id,
                    'ass_id' =>$ass_id,
                    ]);
                }
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/assignment');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($ass_id)
    {
        if(is_numeric($ass_id))
        {
            DB::table('assignment')->where('ass_id',$ass_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}