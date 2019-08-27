<?php
namespace App\Modules\Requestlog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class RequestlogController extends Controller
{
   
    public function update( $req_id,Request $request)
    {
        $percent_doc = $request->get('percent_doc');
        $percent_study = $request->get('percent_study');
        $percent_book = $request->get('percent_book');
        $percent_text = $request->get('percent_text');

        if(is_numeric($req_id) && is_numeric($percent_doc) && is_numeric($percent_study) && is_numeric($percent_book) && is_numeric($percent_text))
        {
            DB::table('request')->where('req_id',$req_id)->update([
                'percent_doc' =>$percent_doc,
                'percent_study' =>$percent_study,
                'percent_book' =>$percent_book,
                'percent_text' =>$percent_text,
                'updated_at' =>date('Y-m-d H:i:s'),
            ]);
            DB::table('requestlog')->insert([
                'req_id' =>$req_id,
                'percent_doc' =>$percent_doc,
                'percent_study' =>$percent_study,
                'percent_book' =>$percent_book,
                'percent_text' =>$percent_text,
                'created_at' =>date('Y-m-d H:i:s'),
                
            ]);
           
            return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/request');
        }else{
            return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
        }
    
    }
    public function show($req_id,Request $request)
    {
        if(is_numeric($req_id))
        {
        $request  = DB::table('request')
        ->where('req_id','=',$req_id)->first();
            return view('log::form',[
                'req_id'=>$req_id,
                'request'=>$request
            ]);
        }
        return view('data-not-found',['back_url'=>'/request']);
    }
    public function edit($rog_id,Request $request)
    {
        if(is_numeric($rog_id))
        //print_r($req_id);exit;
        {
        $requestlogs = DB::table('requestlog')
        ->where('req_id','=',$rog_id)->get(); 
            return view('log::list',[
                'req_id'=>$rog_id,
                'requestlogs'=>$requestlogs
            ]);
        }
        
        return view('data-not-found',['back_url'=>'/request']);
    }

}