<?php
namespace App\Modules\Publishs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class PublishsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $publish = DB::table('publish')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $publish->where(function ($query) use($keyword){
            $query->where('pub_name','LIKE','%'.$keyword.'%')
                  ->where('date','LIKE','%'.$keyword.'%')
                  ->where('place','LIKE','%'.$keyword.'%');
            });
        }
        $publish = $publish->paginate(50);
        return view('pub::list',compact('publish'));
    }
    public function create()
    {
        return view('pub::form');
    }
    public function store(Request $request)
    {
        $pubname = $request->get('pubname');
        $date = $request->get('date');
        $place = $request->get('place');
        
        if(!empty($pubname) && !empty($date) && !empty($place))
        {
            DB::table('publish')->insert([
                'pub_name' =>$pubname,
                'date' =>$date,
                'place' =>$place,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/publishs');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');   
        }
    
    }
    public function show($pub_id,Request $request)
    {
        if(is_numeric($pub_id))  
        {
            $publishs= DB::table('publish')->where('pub_id',$pub_id)->first();
            if(!empty($publishs))
            {
                return view('pub::form',[
                    'publishs'=>$publishs
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/publishs']);
    }
    
    public function update($pub_id,Request $request)
    {
        if(is_numeric($pub_id))
        {
            $pubname = $request->get('pubname');
            $date = $request->get('date');
            $place = $request->get('place');
        
            if(!empty($pubname) && !empty($date) && !empty($place))
            {
                DB::table('publish')->where('pub_id',$pub_id)->update([
                    'pub_name' =>$pubname,
                    'date' =>$date,
                    'place' =>$place,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/publishs');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($pub_id)
    {
        if(is_numeric($pub_id))
        {
            DB::table('publish')->where('pub_id',$pub_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}