<?php
namespace App\Modules\Worktype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class WorktypeController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $worktype = DB::table('worktype')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $worktype->where(function ($query) use($keyword){
                $query->where('wokt_name','LIKE','%'.$keyword.'%');
            });
        }
        $worktype = $worktype->paginate(10);
        return view('wokt::list',compact('worktype'));
    }
    public function create()
    {
        return view('wokt::form');
    }
    public function store(Request $request)
    {
        $woktname = $request->get('woktname');

        if(!empty($woktname))
        {
            DB::table('worktype')->insert([
                'wokt_name' =>$woktname,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/worktype');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($wokt_id,Request $request)
    {
        if(is_numeric($wokt_id))
        {
            $worktypes = DB::table('worktype')->where('wokt_id',$wokt_id)->first();
            if(!empty($worktypes))
            {
                return view('wokt::form',[
                    'worktypes'=>$worktypes
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/worktype']);
    }
    
    public function update($wokt_id,Request $request)
    {
        if(is_numeric($wokt_id))
        {
            $woktname = $request->get('woktname');

            if(!empty($woktname) )
            {
                DB::table('worktype')->where('wokt_id',$wokt_id)->update([
                    'wokt_name' =>$woktname,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/worktype');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($wokt_id)
    {
        if(is_numeric($wokt_id))
        {
            DB::table('worktype')->where('wokt_id',$wokt_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}