<?php
namespace App\Modules\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class PositionController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $academic = DB::table('academic')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $academic->where(function ($query) use($keyword){
                $query->where('aca_name','LIKE','%'.$keyword.'%')
                      ->orWhere('initials','LIKE','%'.$keyword.'%');
            });
        }
        $academic = $academic->paginate(10);
        return view('pos::positionlist',compact('academic'));
    }
    public function create()
    {
        return view('pos::positionform');
    }
    public function store(Request $request)
    {
        $acaname = $request->get('acaname');
        $initials = $request->get('initials');
        if(!empty($acaname) && !empty($initials))
        {
            DB::table('academic')->insert([
                'aca_name' =>$acaname,
                'initials' =>$initials,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/position');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($aca_id,Request $request)
    {
        if(is_numeric($aca_id))
        {
            $position = DB::table('academic')->where('aca_id',$aca_id)->first();
            if(!empty($position))
            {
                return view('pos::positionform',[
                    'position'=>$position
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/position']);
    }
    
    public function update($aca_id,Request $request)
    {
        if(is_numeric($aca_id))
        {
            $acaname = $request->get('acaname');
            $initials = $request->get('initials');
            if(!empty($acaname) && !empty($initials))
            {
                DB::table('academic')->where('aca_id',$aca_id)->update([
                    'aca_name'   =>$acaname,
                    'initials'   =>$initials,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/position');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($aca_id)
    {
        if(is_numeric($aca_id))
        {
            DB::table('academic')->where('aca_id',$aca_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}