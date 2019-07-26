<?php
namespace App\Modules\Right;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class RightController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $right = DB::table('right')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $right->where(function ($query) use($keyword){
                $query->where('right_name','LIKE','%'.$keyword.'%');
            });
        }
        $right = $right->paginate(10);
        return view('rig::rightlist',compact('right'));
    }
    public function create()
    {
        return view('rig::rightform');
    }
    public function store(Request $request)
    {
        $rightname = $request->get('rightname');

        if(!empty($rightname))
        {
            DB::table('right')->insert([
                'right_name' =>$rightname,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/right');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($right_id,Request $request)
    {
        if(is_numeric($right_id))
        {
            $rights = DB::table('right')->where('right_id',$right_id)->first();
            if(!empty($rights))
            {
                return view('rig::rightform',[
                    'rights'=>$rights
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/right']);
    }
    
    public function update($right_id,Request $request)
    {
        if(is_numeric($right_id))
        {
            $rightname = $request->get('rightname');

            if(!empty($rightname) )
            {
                DB::table('right')->where('right_id',$right_id)->update([
                    'right_name' =>$rightname,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/right');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($right_id)
    {
        if(is_numeric($right_id))
        {
            DB::table('right')->where('right_id',$right_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}