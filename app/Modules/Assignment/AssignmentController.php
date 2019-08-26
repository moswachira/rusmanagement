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
        $wokt_id = $request->get('wokt_id');
        $currentuser = CurrentUser::user();

        $assignments = DB::table('assignment')
        ->select('assignment.*','worktype.wokt_name','teacher.first_name','teacher.last_name')
        ->leftJoin('worktype','assignment.wokt_id','worktype.wokt_id')
        ->leftJoin('teacher','assignment.tea_id','teacher.tea_id')
        ->whereNull('assignment.deleted_at');
        if(!CurrentUser::is_admin()){
            $assignments->where('teacher.tea_id',$currentuser->tea_id);
            }

        if(!empty($keyword))
        {
            $assignments->where(function ($query) use($keyword){
                $query->where('subject','LIKE','%'.$keyword.'%')
                      ->orWhere('year','LIKE','%'.$keyword.'%');
            });
        }
        
        if(is_numeric($wokt_id))
        {
            $assignments->where('assignment.wokt_id','=',$wokt_id);
        }

        $assignments = $assignments->orderBy('assignment.ass_name','asc')->paginate(10);
        $worktype = DB::table('worktype')->whereNull('deleted_at')->get();

        return view('ass::list',compact('assignments','worktype'));
        
    }
     
    public function create()
    {
        $worktype = DB::table('worktype')->whereNull('deleted_at')->get();

        return view('ass::form',compact('worktype'));
    }
    public function store(Request $request)
    {
        $ass_name = $request->get('ass_name');
        $start_time = $request->get('start_time');
        $end_time = $request->get('end_time');
        $wokt_id = $request->get('wokt_id');
        $currentuser = CurrentUser::user();

        if(!empty($ass_name) && !empty($start_time)  && !empty($end_time) && is_numeric($wokt_id))
        {
                DB::table('assignment')->insert([
                    'ass_name' =>$ass_name,
                    'start_time' =>$start_time,
                    'end_time' =>$end_time,
                    'wokt_id' =>$wokt_id,
                    'tea_id' =>$currentuser->tea_id,
                    'created_at' =>date('Y-m-d H:i:s'),
                ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/assignment');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($ass_id,Request $request)
    {
        if(is_numeric($ass_id))
        {
            $assignments = DB::table('assignment')->where('ass_id',$ass_id)->first();
            if(!empty($assignments))
            {
                $worktype = DB::table('worktype')->whereNull('deleted_at')->get();
                return view('ass::form',[
                    'assignment'=>$assignments,
                    'worktype'=>$worktype
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
            $wokt_id = $request->get('wokt_id');


            if(!empty($ass_name) && !empty($start_time)  && !empty($end_time) && is_numeric($wokt_id))
            {
                DB::table('assignment')->where('wokt_id',$wokt_id)->update([
                    'ass_name' =>$ass_name,
                    'start_time' =>$start_time,
                    'end_time' =>$end_time,
                    'wokt_id' =>$wokt_id,
                    'created_at' =>date('Y-m-d H:i:s'),
                ]);
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