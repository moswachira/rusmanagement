<?php
namespace App\Modules\Assignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
use App\Services\CurrentUser;
class JobController extends Controller
{
    public function jobshow(Request $request)
    {
        $ass_id = $request->get('ass_id');
        $tea_id = $request->get('tea_id');

        if(is_numeric($ass_id) && is_numeric($tea_id))
        //print_r($req_id);exit;
        {
            $assignments = DB::table('assignment')
            ->where('ass_id','=',$ass_id)->update([
                'tea_id' =>$tea_id,
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/assignment');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        } 
    }
}