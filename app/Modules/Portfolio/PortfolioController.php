<?php
namespace App\Modules\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $acatype_id = $request->get('acatype_id');
        $gro_id = $request->get('gro_id');
        $pub_id = $request->get('pub_id');

        $portfolio = DB::table('portfolio')
        ->select('portfolio.*','academictype.acatype_name','group.gro_name','publish.pub_name')
        ->leftJoin('academictype','portfolio.acatype_id','academictype.acatype_id')
        ->leftJoin('group','portfolio.gro_id','group.gro_id')
        ->leftJoin('publish','portfolio.pub_id','publish.pub_id')
        ->whereNull('portfolio.deleted_at');

        if(!empty($keyword))
        {
            $portfolio->where(function ($query) use($keyword){
                $query->where('por_name','LIKE','%'.$keyword.'%')
                      ->orWhere('date','LIKE','%'.$keyword.'%')
                      ->orWhere('place','LIKE','%'.$keyword.'%');
            });
        }
        
        if(is_numeric($acatype_id))
        {
            $portfolio->where('portfolio.acatype_id','=',$acatype_id);
        }
        if(is_numeric($gro_id))
        {
            $portfolio->where('portfolio.gro_id','=',$gro_id);
        }
        if(is_numeric($pub_id))
        {
            $portfolio->where('portfolio.pub_id','=',$pub_id);
        }
        
        $portfolio = $portfolio->orderBy('portfolio.por_name','asc')->paginate(10);
        $academictype = DB::table('academictype')->whereNull('deleted_at')->get();
        $group = DB::table('group')->whereNull('deleted_at')->get();
        $publish = DB::table('publish')->whereNull('deleted_at')->get();
        return view('por::list',compact('portfolio','academictype','group','publish'));
    }
    public function create()
    {
        $academictype = DB::table('academictype')->whereNull('deleted_at')->get();
        $group = DB::table('group')->whereNull('deleted_at')->get();
        $publish = DB::table('publish')->whereNull('deleted_at')->get();
        return view('por::form',compact('academictype','group','publish'));
    }
    public function store(Request $request)
    {
        $porname = $request->get('porname');
        $score = $request->get('score');
        $acatype_id = $request->get('acatype_id');
        $gro_id = $request->get('gro_id');
        $pub_id = $request->get('pub_id');

        if(!empty($porname) && !empty($score) && is_numeric($acatype_id) && is_numeric($gro_id) && is_numeric($pub_id))
        {
            $portfolio = DB::table('portfolio')
            ->where('porname',$porname)
            ->where('score',$score)
            ->whereNull('portfolio.deleted_at')->first();
            if(!empty($portfolio)){
                return MyResponse::error('ขออภัยข้อมูลนี้มีในระบบแล้วคะ');
            }
                
                DB::table('portfolio')->insert([
                    'porname' =>$porname,
                    'score' =>$score,
                    'acatype_id' =>$acatype_id,
                    'gro_id' =>$gro_id,
                    'pub_id' =>$pub_id,
                    'created_at' =>date('Y-m-d H:i:s'),
                ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/portfolio');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($por_id,Request $request)
    {
        if(is_numeric($por_id))
        {
            $port = DB::table('portfolio')->where('por_id',$por_id)->first();
            if(!empty($port))
            {
                $academictype = DB::table('academictype')->whereNull('deleted_at')->get();
                $group = DB::table('group')->whereNull('deleted_at')->get();
                $publish = DB::table('publish')->whereNull('deleted_at')->get();
                return view('por::form',[
                    'port'=>$port,
                    'academictype'=>$academictype,
                    'group'=>$group,
                    'publish'=>$publish,
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/portfolio']);
    }
    
    public function update($por_id,Request $request)
    {
        if(is_numeric($por_id))
        {
            $porname = $request->get('porname');
            $score = $request->get('score');
            $acatype_id = $request->get('acatype_id');
            $gro_id = $request->get('gro_id');
            $pub_id = $request->get('pub_id');


            if(!empty($porname) && !empty($score) && is_numeric($acatype_id) && is_numeric($gro_id)  && is_numeric($pub_id))
            {
            $portfolio = DB::table('portfolio')
            ->where('por_id','!=',$por_id)
            ->where('por_name',$porname)
            ->where('score',$score)
            ->whereNull('portfolio.deleted_at')->first();
            if(!empty($portfolio)){
                return MyResponse::error('ขออภัยข้อมูลนี้มีในระบบแล้วคะ');
            }
                DB::table('portfolio')->where('por_id',$por_id)->update([
                    'por_name' =>$porname,
                    'score' =>$score,
                    'acatype_id' =>$acatype_id,
                    'gro_id' =>$gro_id,
                    'pub_id' =>$pub_id,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/portfolio');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($por_id)
    {
        if(is_numeric($por_id))
        {
            DB::table('portfolio')->where('por_id',$por_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}