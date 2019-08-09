<?php
namespace App\Modules\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $document = DB::table('document')
        ->whereNull('deleted_at');
        if(!empty($keyword)){
            $document->where(function ($query) use($keyword){
            $query->where('doc_name','LIKE','%'.$keyword.'%');
            });
        }
        $document = $document->paginate(50);
        return view('doc::list',compact('document'));
    }
    public function create()
    {
        return view('doc::form');
    }
    public function store(Request $request)
    {
        $docname = $request->get('docname');
        if(!empty($docname))
        {
            DB::table('document')->insert([
                'doc_name' =>$docname,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/document');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');   
        }
    
    }
    public function show($doc_id,Request $request)
    {
        if(is_numeric($doc_id))  
        {
            $documents= DB::table('document')->where('doc_id',$doc_id)->first();
            if(!empty($documents))
            {
                return view('doc::form',[
                    'documents'=>$documents
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/document']);
    }
    
    public function update($doc_id,Request $request)
    {
        if(is_numeric($doc_id))
        {
            $docname = $request->get('docname');

            if(!empty($docname))
            {
                DB::table('document')->where('doc_id',$doc_id)->update([
                    'doc_name' =>$docname,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/document');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($doc_id)
    {
        if(is_numeric($doc_id))
        {
            DB::table('document')->where('doc_id',$doc_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}