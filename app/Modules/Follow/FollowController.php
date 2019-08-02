<?php
namespace App\Modules\Follow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
use App\Services\CurrentUser;
class FollowController extends Controller
{
   
    public function store(Request $request)
    {
        $date = $request->get('date');
        $status = $request->get('status');
        $detail = $request->get('detail');
        $edu_id = $request->get('edu_id');
        $currentuser = CurrentUser::user();

        if(!empty($date)  && !empty($detail) && !empty($status) && is_numeric($edu_id))
        {
                DB::table('follow')->insert([
                    'date' =>$date,
                    'detail' =>$detail,
                    'status' =>$status,
                    'edu_id' =>$edu_id,
                    'created_at' =>date('Y-m-d H:i:s'),
                ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/follow/'.$edu_id);
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($fow_id,Request $request)
    {
        if(is_numeric($fow_id))
        {
            $follow = DB::table('follow')
        ->select('follow.*','teacher.first_name','teacher.last_name')
        ->leftJoin('education','follow.edu_id','education.edu_id')
        ->leftJoin('teacher','teacher.tea_id','education.tea_id')
        ->where('follow.edu_id','=',$fow_id)->whereNull('follow.deleted_at')->get();
                return view('fow::list',[
                    'follow'=>$follow,
                    'edu_id'=>$fow_id,
                ]);
            }
        
        return view('data-not-found',['back_url'=>'/follow']);
    }

}