<?php
namespace App\Modules\Positiontypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;   
use App\Services\MyResponse;
class PositiontypesController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $positiontype = DB::table('positiontype')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $positiontype->where(function ($query) use($keyword){
            $query->where('pos_name','LIKE','%'.$keyword.'%');
            });
        }
        $positiontype = $positiontype->paginate(50);
        return view('post::list',compact('positiontype'));
    }
    public function create()
    {
        return view('post::form');
    }
    public function store(Request $request)
    {
        $posname = $request->get('posname');
        if(!empty($posname))
        {
            DB::table('positiontype')->insert([
                'pos_name' =>$posname,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/positiontypes');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');   
        }
    
    }
    public function show($pos_id,Request $request)
    {
        if(is_numeric($pos_id))  
        {
            $positiontypes= DB::table('positiontype')->where('pos_id',$pos_id)->first();
            if(!empty($positiontypes))
            {
                return view('post::form',[
                    'positiontypes'=>$positiontypes
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/positiontypes']);
    }
    
    public function update($pos_id,Request $request)
    {
        if(is_numeric($pos_id))
        {
            $posname = $request->get('posname');

            if(!empty($posname))
            {
                DB::table('positiontype')->where('pos_id',$pos_id)->update([
                    'pos_name' =>$posname,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/positiontypes');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง'); 
    }

    public function destroy($pos_id)
    {
        if(is_numeric($pos_id))
        {
            DB::table('positiontype')->where('pos_id',$pos_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}