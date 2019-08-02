<?php
namespace App\Modules\Degrees;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class DegreesController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $degree = DB::table('degree')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $degree->where(function ($query) use($keyword){
            $query->where('degr_name','LIKE','%'.$keyword.'%');
            });
        }
        $degree = $degree->paginate(50);
        return view('deg::list',compact('degree'));
    }
    public function create()
    {
        return view('deg::form');
    }
    public function store(Request $request)
    {
        $degrname = $request->get('degrname');
        if(!empty($degrname))
        {
            DB::table('degree')->insert([
                'degr_name' =>$degrname,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/degrees');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');   
        }
    
    }
    public function show($degr_id,Request $request)
    {
        if(is_numeric($degr_id))  
        {
            $degrees= DB::table('degree')->where('degr_id',$degr_id)->first();
            if(!empty($degrees))
            {
                return view('degr::form',[
                    'degrees'=>$degrees
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/degrees']);
    }
    
    public function update($degr_id,Request $request)
    {
        if(is_numeric($degr_id))
        {
            $degrname = $request->get('degrname');

            if(!empty($degrname))
            {
                DB::table('degree')->where('degr_id',$degr_id)->update([
                    'degr_name' =>$degrname,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/degrees');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($degr_id)
    {
        if(is_numeric($degr_id))
        {
            DB::table('degree')->where('degr_id',$degr_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}