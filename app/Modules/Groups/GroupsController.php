<?php
namespace App\Modules\Groups;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class GroupsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $group = DB::table('group')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $group->where(function ($query) use($keyword){
                $query->where('gro_name','LIKE','%'.$keyword.'%');
            });
        }
        $group = $group->paginate(10);
        return view('gro::list',compact('group'));
    }
    public function create()
    {
        return view('gro::form');
    }
    public function store(Request $request)
    {
        $groname = $request->get('groname');
        if(!empty($groname))
        {
            DB::table('group')->insert([
                'gro_name' =>$groname,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/groups');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');   
        }
    
    }
    public function show($gro_id,Request $request)
    {
        if(is_numeric($gro_id))  
        {
            $groups= DB::table('group')->where('gro_id',$gro_id)->first();
            if(!empty($groups))
            {
                return view('gro::form',[
                    'groups'=>$groups
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/groups']);
    }
    
    public function update($gro_id,Request $request)
    {
        if(is_numeric($gro_id))
        {
            $groname = $request->get('groname');

            if(!empty($groname))
            {
                DB::table('group')->where('gro_id',$gro_id)->update([
                    'gro_name' =>$groname,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/groups');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($gro_id)
    {
        if(is_numeric($gro_id))
        {
            DB::table('group')->where('gro_id',$gro_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}