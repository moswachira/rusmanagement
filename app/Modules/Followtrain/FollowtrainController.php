<?php
namespace App\Modules\Followtrain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
use App\Services\CurrentUser;
class FollowtrainController extends Controller
{
   
    public function store(Request $request) 
    {
        $date = $request->get('date');
        $side = $request->get('side');
        $detail = $request->get('detail');
        $tra_id = $request->get('tra_id');
        $currentuser = CurrentUser::user();

        if(!empty($date)  && !empty($detail) && !empty($side) && is_numeric($tra_id))
        {
                DB::table('followtrain')->insert([
                    'date' =>$date,
                    'detail' =>$detail,
                    'side' =>$side,
                    'tra_id' =>$tra_id,
                    'created_at' =>date('Y-m-d H:i:s'),
                ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/followtrain/'.$tra_id);
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($followtr_id,Request $request)
    {
        if(is_numeric($followtr_id))
        {
            $followtrain = DB::table('followtrain')
        ->select('followtrain.*','teacher.first_name','teacher.last_name')
        ->leftJoin('training','followtrain.tra_id','training.tra_id')
        ->leftJoin('teacher','teacher.tea_id','training.tea_id')
        ->where('followtrain.tra_id','=',$followtr_id)->whereNull('followtrain.deleted_at')->get();
                return view('fot::list',[
                    'followtrain'=>$followtrain,
                    'tra_id'=>$followtr_id,
                ]);
            }
        
        return view('data-not-found',['back_url'=>'/followtrain']);
    }

}


