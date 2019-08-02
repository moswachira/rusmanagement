<?php
namespace App\Modules\Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
use App\Services\CurrentUser;
class RequestController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $aca_id = $request->get('acas_id');

        $request = DB::table('request')
        ->select('request.*','teacher.first_name','teacher.last_name','academic.aca_name')
        ->leftJoin('teacher','request.tea_id','teacher.tea_id')
        ->leftJoin('academic','teacher.aca_id','academic.aca_id')
        ->whereNull('request.deleted_at');

        if(!empty($keyword))
        {
            $request->where(function ($query) use($keyword){
                $query->where('req_name','LIKE','%'.$keyword.'%');
            });
        }
        
        if(is_numeric($aca_id))
        {
            $request->where('request.aca_id','=',$aca_id);
        }
        
        $request = $request->orderBy('request.req_name','asc')->paginate(10);
        $academic = DB::table('academic')->whereNull('deleted_at')->get();
        return view('req::list',compact('request','academic'));
    }
    public function create()
    {
        $currentuser = CurrentUser::user();
        $academic  = DB::table('academic')->whereNull('deleted_at')->get();
        $profressor = DB::table('teacher')
        ->leftJoin('academic','teacher.aca_id','academic.aca_id')
        ->where('tea_id','=',$currentuser->tea_id)->whereNull('teacher.deleted_at')->first();
        return view('req::form',compact('academic','profressor'));
    }
    public function store(Request $request)
    {
        $req_name = $request->get('req_name');
        $note = $request->get('note');
        $complete_year = $request->get('complete_year');
        $aca_id = $request->get('aca_id');
        $position = $request->get('position');
        $currentuser = CurrentUser::user();

        if(!empty($req_name) && !empty($note) && !empty($complete_year))
        {
                DB::table('request')->insert([
                    'req_name' =>$req_name,
                    'note' =>$note,
                    'complete_year' =>$complete_year,
                    'position' =>$position,
                    'aca_id' =>$aca_id,
                    'tea_id' =>$currentuser->tea_id,
                    'created_at' =>date('Y-m-d H:i:s'),
                ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/request');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($req_id,Request $request)
    {
        if(is_numeric($req_id))
        {
            $requests = DB::table('request')->where('req_id',$req_id)->first();
            if(!empty($requests))
            {
                $academic = DB::table('academic')->whereNull('deleted_at')->get();
                $profressor = DB::table('teacher')
                ->leftJoin('academic','teacher.aca_id','academic.aca_id')
                ->where('tea_id','=',$requests->tea_id)->whereNull('teacher.deleted_at')->first();
                return view('req::form',[
                    'requests'=>$requests,
                    'academic'=>$academic,
                    'teacher'=>$teacher,
                    'profressor'=>$profressor
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/request']);
    }
    
    public function update($req_id,Request $request)
    {
        if(is_numeric($req_id))
        {
            $req_name = $request->get('req_name');
            $note = $request->get('note');
            $complete_year = $request->get('complete_year');

            if(!empty($req_name) && !empty($note) && !empty($complete_year))
            {
                DB::table('request')->where('req_id',$req_id)->update([
                    'req_name' =>$req_name,
                    'note' =>$note,
                    'complete_year' =>$complete_year,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
               
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/request');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($req_id)
    {
        if(is_numeric($req_id))
        {
            DB::table('request')->where('req_id',$req_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}