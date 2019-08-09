<?php
namespace App\Modules\Sides;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class SidesController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $side = DB::table('side')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $side->where(function ($query) use($keyword){
            $query->where('side_name','LIKE','%'.$keyword.'%');
            });
        }
        $side = $side->paginate(10);
        return view('sid::list',compact('side'));
    }
    public function create()
    {
        return view('sid::form');
    }
    public function store(Request $request)
    {
        $sidename = $request->get('sidename');
        if(!empty($sidename))
        {
            DB::table('side')->insert([
                'side_name' =>$sidename,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/sides');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');   
        }
    
    }
    public function show($side_id,Request $request)
    {
        if(is_numeric($side_id))  
        {
            $sides= DB::table('side')->where('side_id',$side_id)->first();
            if(!empty($sides))
            {
                return view('sid::form',[
                    'sides'=>$sides
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/sides']);
    }
    
    public function update($side_id,Request $request)
    {
        if(is_numeric($side_id))
        {
            $sidename = $request->get('sidename');

            if(!empty($sidename))
            {
                DB::table('side')->where('side_id',$side_id)->update([
                    'side_name' =>$sidename,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/sides');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($side_id)
    {
        if(is_numeric($side_id))
        {
            DB::table('side')->where('side_id',$side_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}