<?php
namespace App\Modules\Train;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
use App\Services\CurrentUser;
class TrainController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword'); 
        $currentuser = CurrentUser::user();

        $training = DB::table('training')
        ->select('training.*','teacher.first_name','teacher.last_name')
        ->leftJoin('teacher','training.tea_id','teacher.tea_id')
        ->whereNull('training.deleted_at');
        if(!CurrentUser::is_admin()){
        $training->where('teacher.tea_id',$currentuser->tea_id);
        }

        if(!empty($keyword)){
            $training->where(function ($query) use($keyword){
                $query->where('tra_name','LIKE','%'.$keyword.'%')
                      ->orWhere('start_time','LIKE','%'.$keyword.'%')
                      ->orWhere('end_time','LIKE','%'.$keyword.'%')
                      ->orWhere('place','LIKE','%'.$keyword.'%');
            });
        }
        $training = $training->paginate(10);
        return view('tra::list',compact('training'));
    }
    public function create()
    {
        return view('tra::form');
    }
    public function store(Request $request)
    {
        $traname = $request->get('traname');
        $starttime = $request->get('starttime');
        $endtime = $request->get('endtime');
        $place = $request->get('place');
        $detail = $request->get('detail');
        $currentuser = CurrentUser::user();
        

        if(!empty($traname) && !empty($starttime) && !empty($endtime) && !empty($place) && !empty($detail))
        {
                DB::table('training')->insert([
                    'tra_name' =>$traname,
                    'start_time' =>$starttime,
                    'end_time' =>$endtime,
                    'place' =>$place,
                    'detail' =>$detail,
                    'tea_id' =>$currentuser->tea_id,
                    'created_at' =>date('Y-m-d H:i:s'),
                ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/train');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($tra_id,Request $request)
    {
        if(is_numeric($tra_id))
        {
            $train = DB::table('training')->where('tra_id',$tra_id)->first();
            if(!empty($train))
            {
                return view('tra::form',[
                    'train'=>$train
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/train']);
    }
    
    public function update($tra_id,Request $request)
    {
        if(is_numeric($tra_id))
        {
            $traname = $request->get('traname');
            $starttime = $request->get('starttime');
            $endtime = $request->get('endtime');
            $place = $request->get('place');
            $detail = $request->get('detail');

            if(!empty($traname) && !empty($starttime) && !empty($endtime) && !empty($place) && !empty($detail))
            {
                DB::table('training')->where('tra_id',$tra_id)->update([
                    'tra_name' =>$traname,
                    'start_time' =>$starttime,
                    'end_time' =>$endtime,
                    'place' =>$place,
                    'detail' =>$detail,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/train');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($tra_id)
    {
        if(is_numeric($tra_id))
        {
            DB::table('training')->where('tra_id',$tra_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}