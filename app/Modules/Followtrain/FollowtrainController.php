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
        $start_time = $request->get('start_time');
        $end_time = $request->get('end_time');
        $side_id = $request->get('side_id');
        $detail = $request->get('detail');
        $status = $request->get('status');
        $tra_id = $request->get('tra_id');
        $currentuser = CurrentUser::user();

        if(!empty($start_time) && !empty($end_time) && !empty($detail) && !empty($status) && is_numeric($side_id) && is_numeric($tra_id))
        {
                DB::table('followtrain')->insert([
                    'start_time' =>$start_time,
                    'end_time' =>$end_time,
                    'detail' =>$detail,
                    'side_id' =>$side_id,
                    'status' =>$status,
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
            $side = DB::table('side')->whereNull('deleted_at')->get();
            $followtrain = DB::table('followtrain')
        ->select('followtrain.*','teacher.first_name','teacher.last_name','side.side_name')
        ->leftJoin('training','followtrain.tra_id','training.tra_id')
        ->leftJoin('teacher','teacher.tea_id','training.tea_id')
        ->leftJoin('side','followtrain.side_id','side.side_id')
        ->where('followtrain.tra_id','=',$followtr_id)
        ->whereNull('followtrain.deleted_at')->first();
        $form = view('fot::form',[
                    'side'=>$side,
                    'tra_id'=>$followtr_id,
        ]);
            if(!empty($followtrain)){
                $form = view('fot::detail',[
                    'followtrain'=>$followtrain,
                    'side'=>$side,
                    'tra_id'=>$followtr_id,
        ]);
            }
                return view('fot::list',[
                    'followtrain'=>$followtrain,
                    'tra_id'=>$followtr_id,
                    'side'=>$side,
                    'form'=>$form->render(),
                ]);
            }
        
        return view('data-not-found',['back_url'=>'/followtrain']);
    }

}


