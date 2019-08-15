<?php
namespace App\Modules\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class TermController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $term = DB::table('term')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $term->where(function ($query) use($keyword){
                $query->where('term_name','LIKE','%'.$keyword.'%');
            });
        }
        $term = $term->paginate(10);
        return view('term::list',compact('term'));
    }
    public function create()
    {
        return view('term::form');
    }
    public function store(Request $request)
    {
        $termname = $request->get('termname');
        if(!empty($termname))
        {
            DB::table('term')->insert([
                'term_name' =>$termname,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/term');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($term_id,Request $request)
    {
        if(is_numeric($term_id))
        {
            $terms = DB::table('term')->where('term_id',$term_id)->first();
            if(!empty($terms))
            {
                return view('term::form',[
                    'terms'=>$terms
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/position']);
    }
    
    public function update($term_id,Request $request)
    {
        if(is_numeric($term_id))
        {
            $termname = $request->get('termname');
            if(!empty($termname))
            {
                DB::table('term')->where('term_id',$term_id)->update([
                    'term_name'   =>$termname,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/term');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($term_id)
    {
        if(is_numeric($term_id))
        {
            DB::table('term')->where('term_id',$term_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}