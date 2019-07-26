<?php
namespace App\Modules\Reports;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class ReportsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $report = DB::table('report')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $report->where(function ($query) use($keyword){
                $query->where('side','LIKE','%'.$keyword.'%')
                      ->orWhere('date','LIKE','%'.$keyword.'%');
            });
        }
        $report = $report->paginate(10);
        return view('repo::list',compact('report'));
    }
    public function create()
    {
        return view('repo::form');
    }
    public function store(Request $request)
    {
        $side = $request->get('side');
        $date = $request->get('date');
        if(!empty($side) && !empty($date))
        {
            DB::table('report')->insert([
                'side' =>$side,
                'date' =>$date,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/reports');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    }
    public function show($rep_id,Request $request)
    {
        if(is_numeric($rep_id))
        {
            $reports = DB::table('report')->where('rep_id',$rep_id)->first();
            if(!empty($reports))
            {
                return view('repo::form',[
                    'reports'=>$reports
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/reports']);
    }
    
    public function update($rep_id,Request $request)
    {
        if(is_numeric($rep_id))
        {
            $side = $request->get('side');
            $date = $request->get('date');
            if(!empty($side) && !empty($date))
            {
                DB::table('report')->where('rep_id',$rep_id)->update([
                    'side'   =>$side,
                    'date'   =>$date,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/reports');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($rep_id)
    {
        if(is_numeric($rep_id))
        {
            DB::table('report')->where('rep_id',$rep_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}