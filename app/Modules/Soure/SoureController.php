<?php
namespace App\Modules\Soure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class SoureController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $sout_id = $request->get('sout_id');

        $soure = DB::table('soure')
        ->select('soure.*','souretype.sout_name')
        ->leftJoin('souretype','souretype.sout_id','soure.sout_id')
        ->whereNull('soure.deleted_at');
        if(!empty($keyword)){
            $soure->where(function ($query) use($keyword){
                $query->where('sour_name','LIKE','%'.$keyword.'%');
            });
        }
        if(is_numeric($sout_id))
        {
            $soure->where('soure.sout_id','=',$sout_id);
        }
        $soure = $soure->orderBy('soure.sour_name','asc')->paginate(10);
        $souretype = DB::table('souretype')->whereNull('deleted_at')->get();
        return view('sou::list',compact('soure','souretype'));
    }
    public function create()
    {
        $souretype = DB::table('souretype')->whereNull('deleted_at')->get();
        return view('sou::form',compact('souretype'));
    }
    public function store(Request $request)
    {
        $sourname = $request->get('sourname');
        $sout_id = $request->get('sout_id');

        if(!empty($sourname) && is_numeric($sout_id))
        {
            DB::table('soure')->insert([
                'sour_name' =>$sourname,
                'sout_id' =>$sout_id,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/soure');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($sour_id,Request $request)
    {
        if(is_numeric($sour_id))
        {
            $soures = DB::table('soure')->where('sour_id',$sour_id)->first();
            if(!empty($soures))
            {
                $souretype = DB::table('souretype')->whereNull('deleted_at')->get();
                return view('sou::form',[
                    'soures'=>$soures,
                    'souretype'=>$souretype
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/soure']);
    }
    
    public function update($sour_id,Request $request)
    {
        if(is_numeric($sour_id))
        {
            $sourname = $request->get('sourname');
            $sout_id = $request->get('sout_id');

            if(!empty($sourname) && is_numeric($sout_id))
            {
                DB::table('soure')->where('sour_id',$sour_id)->update([
                    'sour_name' =>$sourname,
                    'sout_id' =>$sout_id,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/soure');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($sour_id)
    {
        if(is_numeric($sour_id))
        {
            DB::table('soure')->where('sour_id',$sour_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}