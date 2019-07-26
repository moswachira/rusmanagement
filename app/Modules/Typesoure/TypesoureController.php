<?php
namespace App\Modules\Typesoure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class TypesoureController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $souretype = DB::table('souretype')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $souretype->where(function ($query) use($keyword){
                $query->where('sout_name','LIKE','%'.$keyword.'%');
            });
        }
        $souretype = $souretype->paginate(10);
        return view('cap::list',compact('souretype'));
    }
    public function create()
    {
        return view('cap::form');
    }
    public function store(Request $request)
    {
        $soutname = $request->get('soutname');
        if(!empty($soutname))
        {
            DB::table('souretype')->insert([
                'sout_name' =>$soutname,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/typesoure');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($sout_id,Request $request)
    {
        if(is_numeric($sout_id))
        {
            $souretypes = DB::table('souretype')->where('sout_id',$sout_id)->first();
            if(!empty($souretypes))
            {
                return view('cap::form',[
                    'souretypes'=>$souretypes
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/typesoure']);
    }
    
    public function update($sout_id,Request $request)
    {
        if(is_numeric($sout_id))
        {
            $soutname = $request->get('soutname');
            if(!empty($soutname))
            {
                DB::table('souretype')->where('sout_id',$sout_id)->update([
                    'sout_name'   =>$soutname,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/typesoure');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($sout_id)
    {
        if(is_numeric($sout_id))
        {
            DB::table('souretype')->where('sout_id',$sout_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}