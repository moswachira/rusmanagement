<?php
namespace App\Modules\Commentplan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
use App\Services\CurrentUser;
class CommentplanController extends Controller
{

    public function store(Request $request) 
    {
        $comp_name = $request->get('comp_name');
        $fow_id = $request->get('fow_id');
        $currentuser = CurrentUser::user();

        if(!empty($comp_name)  && is_numeric($fow_id))
        {
                DB::table('follow')->where('fow_id',$fow_id)->update([
                    'commentplan' =>$comp_name,
                ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }

}


