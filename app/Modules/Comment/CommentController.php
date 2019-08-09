<?php
namespace App\Modules\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
use App\Services\CurrentUser;
class CommentController extends Controller
{

    public function store(Request $request) 
    {
        $com_name = $request->get('com_name');
        $followt_id = $request->get('followt_id');
        $currentuser = CurrentUser::user();

        if(!empty($com_name)  && is_numeric($followt_id))
        {
                DB::table('followtrain')->where('followt_id',$followt_id)->update([
                    'comment' =>$com_name,
                ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }

}


