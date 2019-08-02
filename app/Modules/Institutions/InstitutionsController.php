<?php
namespace App\Modules\Institutions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class InstitutionsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $institution = DB::table('institution')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $institution->where(function ($query) use($keyword){
            $query->where('inst_name','LIKE','%'.$keyword.'%');
            });
        }
        $institution = $institution->paginate(50);
        return view('ins::list',compact('institution'));
    }
    public function create()
    {
        return view('ins::form');
    }
    public function store(Request $request)
    {
        $instname = $request->get('instname');
        if(!empty($instname))
        {
            DB::table('institution')->insert([
                'inst_name' =>$instname,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/institutions');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');   
        }
    
    }
    public function show($inst_id,Request $request)
    {
        if(is_numeric($inst_id))  
        {
            $institutions= DB::table('institution')->where('inst_id',$inst_id)->first();
            if(!empty($institutions))
            {
                return view('ins::form',[
                    'institutions'=>$institutions
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/institutions']);
    }
    
    public function update($inst_id,Request $request)
    {
        if(is_numeric($inst_id))
        {
            $instname = $request->get('instname');

            if(!empty($instname))
            {
                DB::table('institution')->where('inst_id',$inst_id)->update([
                    'inst_name' =>$instname,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/institutions');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($inst_id)
    {
        if(is_numeric($inst_id))
        {
            DB::table('institution')->where('inst_id',$inst_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}