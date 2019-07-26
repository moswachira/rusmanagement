<?php
namespace App\Modules\Academictype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class AcademictypeController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $academictype = DB::table('academictype')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $academictype->where(function ($query) use($keyword){
                $query->where('acatype_name','LIKE','%'.$keyword.'%');
            });
        }
        $academictype = $academictype->paginate(10);
        return view('acaty::list',compact('academictype'));
    }
    public function create()
    {
        return view('acaty::form');
    }
    public function store(Request $request)
    {
        $acatypename = $request->get('acatypename');

        if(!empty($acatypename))
        {
            DB::table('academictype')->insert([
                'acatype_name' =>$acatypename,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/type');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($acatype_id,Request $request)
    {
        if(is_numeric($acatype_id))
        {
            $type = DB::table('academictype')->where('acatype_id',$acatype_id)->first();
            if(!empty($type))
            {
                return view('acaty::form',[
                    'type'=>$type
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/type']);
    }
    
    public function update($acatype_id,Request $request)
    {
        if(is_numeric($acatype_id))
        {
            $acatypename = $request->get('acatypename');

            if(!empty($acatypename))
            {
                DB::table('academictype')->where('acatype_id',$acatype_id)->update([
                    'acatype_name' =>$acatypename,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/type');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($acatype_id)
    {
        if(is_numeric($acatype_id))
        {
            DB::table('academictype')->where('acatype_id',$acatype_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}