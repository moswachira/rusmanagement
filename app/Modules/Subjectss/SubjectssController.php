<?php
namespace App\Modules\Subjectss;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;   
use App\Services\MyResponse;
class SubjectssController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $subjects = DB::table('subjects')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $subjects->where(function ($query) use($keyword){
            $query->where('sub_name','LIKE','%'.$keyword.'%');
            });
        }
        $subjects = $subjects->paginate(50);
        return view('sub::list',compact('subjects'));
    }
    public function create()
    {
        return view('sub::form');
    }
    public function store(Request $request)
    {
        $subname = $request->get('subname');
        $subcode = $request->get('subcode');
        if(!empty($subname))
        {
            DB::table('subjects')->insert([
                'sub_name' =>$subname,
                'sub_code' =>$subcode,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/subjectss');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');   
        }
    
    }
    public function show($sub_id,Request $request)
    {
        if(is_numeric($sub_id))  
        {
            $subjectss= DB::table('subjects')->where('sub_id',$sub_id)->first();
            if(!empty($subjectss))
            {
                return view('sub::form',[
                    'subjectss'=>$subjectss
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/subjectss']);
    }
    
    public function update($sub_id,Request $request)
    {
        if(is_numeric($sub_id))
        {
            $subname = $request->get('subname');
            $subcode = $request->get('subcode');

            if(!empty($subname))
            {
                DB::table('subjects')->where('sub_id',$sub_id)->update([
                    'sub_name' =>$subname,
                    'sub_code' =>$subcode,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/subjectss');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง'); 
    }

    public function destroy($sub_id)
    {
        if(is_numeric($sub_id))
        {
            DB::table('subjects')->where('sub_id',$sub_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}