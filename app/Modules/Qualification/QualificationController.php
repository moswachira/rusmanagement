<?php
namespace App\Modules\Qualification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class QualificationController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $qualification = DB::table('qualification')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $qualification->where(function ($query) use($keyword){
                $query->where('qua_name','LIKE','%'.$keyword.'%');
            });
        }
        $qualification = $qualification->paginate(10);
        return view('qua::list',compact('qualification'));
    }
    public function create()
    {
        return view('qua::form');
    }
    public function store(Request $request)
    {
        $quaname = $request->get('quaname');

        if(!empty($quaname))
        {
            DB::table('qualification')->insert([
                'qua_name' =>$quaname,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/qualification');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($qua_id,Request $request)
    {
        if(is_numeric($qua_id))
        {
            $quas = DB::table('qualification')->where('qua_id',$qua_id)->first();
            if(!empty($quas))
            {
                return view('qua::form',[
                    'quas'=>$quas
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/qualification']);
    }
    
    public function update($right_id,Request $request)
    {
        if(is_numeric($qua_id))
        {
            $quaname = $request->get('rightname');

            if(!empty($quaname) )
            {
                DB::table('qualification')->where('qua_id',$qua_id)->update([
                    'qua_name' =>$quaname,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/qualification');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($qua_id)
    {
        if(is_numeric($qua_id))
        {
            DB::table('qualification')->where('qua_id',$qua_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}