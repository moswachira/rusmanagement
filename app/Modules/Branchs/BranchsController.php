<?php
namespace App\Modules\Branchs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class BranchsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $branch = DB::table('branch')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $branch->where(function ($query) use($keyword){
            $query->where('bra_name','LIKE','%'.$keyword.'%');
            });
        }
        $branch = $branch->paginate(50);
        return view('bra::list',compact('branch'));
    }
    public function create()
    {
        return view('bra::form');
    }
    public function store(Request $request)
    {
        $braname = $request->get('braname');
        if(!empty($braname))
        {
            DB::table('branch')->insert([
                'bra_name' =>$braname,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/branchs');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');   
        }
    
    }
    public function show($bra_id,Request $request)
    {
        if(is_numeric($bra_id))  
        {
            $branchs= DB::table('branch')->where('bra_id',$bra_id)->first();
            if(!empty($branchs))
            {
                return view('bra::form',[
                    'branchs'=>$branchs
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/branchs']);
    }
    
    public function update($bra_id,Request $request)
    {
        if(is_numeric($bra_id))
        {
            $braname = $request->get('braname');

            if(!empty($braname))
            {
                DB::table('branch')->where('bra_id',$bra_id)->update([
                    'bra_name' =>$braname,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/branchs');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($bra_id)
    {
        if(is_numeric($bra_id))
        {
            DB::table('branch')->where('bra_id',$bra_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}