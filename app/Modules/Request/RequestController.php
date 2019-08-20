<?php
namespace App\Modules\Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
use App\Services\CurrentUser;
class RequestController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $aca_id = $request->get('acas_id');
        $doc_id = $request->get('doc_id');
        $term_id = $request->get('term_id');
        $sub_id = $request->get('sub_id');
        $teapro_id = $request->get('teapro_id');
        $currentuser = CurrentUser::user();

        $request = DB::table('request')
        ->select('request.*','teacher.first_name','teacher.last_name','academic.aca_name','subjects.sub_name')
        ->leftJoin('teacher','request.tea_id','teacher.tea_id')
        ->leftJoin('subjects','request.sub_id','subjects.sub_id')
        ->leftJoin('academic','teacher.aca_id','academic.aca_id')
        ->leftJoin('document','request.doc_id','document.doc_id')
        //->leftJoin('subjects','request.sub_id','subjects.sub_id')
        //->leftJoin('teacherprogram','request.teapro_id','teacherprogram.teapro_id')
        //->leftJoin('term','request.term_id','term.term_id')
        ->whereNull('request.deleted_at');
        if(!CurrentUser::is_admin()){
            $request->where('teacher.tea_id',$currentuser->tea_id);
            }

        if(!empty($keyword))
        {
            $request->where(function ($query) use($keyword){
                $query->where('req_name','LIKE','%'.$keyword.'%');
            });
        }
        
        if(is_numeric($aca_id))
        {
            $request->where('request.aca_id','=',$aca_id);
        }
        if(is_numeric($doc_id))
        {
            $request->where('request.doc_id','=',$doc_id);
        }
        if(is_numeric($teapro_id))
        {
            $request->where('request.teapro_id','=',$teapro_id);
        }
        if(is_numeric($term_id))
        {
            $request->where('request.term_id','=',$term_id);
        }
        if(is_numeric($sub_id))
        {
            $request->where('request.sub_id','=',$sub_id);
        }
        $request = $request->orderBy('request.req_name','asc')->paginate(10);
        $academic = DB::table('academic')->whereNull('deleted_at')->get();
        $document = DB::table('document')->whereNull('deleted_at')->get();
        $teacherprogram = DB::table('teacherprogram')->whereNull('deleted_at')->get();
        $subjects = DB::table('subjects')->whereNull('deleted_at')->get();
        $term = DB::table('term')->whereNull('deleted_at')->get();
        return view('req::list',compact('request','academic','document','teacherprogram','term','subjects'));
    }
    public function create()
    {
        $currentuser = CurrentUser::user();
        $academic  = DB::table('academic')->whereNull('deleted_at')->get();
        $document  = DB::table('document')->whereNull('deleted_at')->get();
        $profressor = DB::table('teacher')
        ->leftJoin('academic','teacher.aca_id','academic.aca_id')
        ->where('tea_id','=',$currentuser->tea_id)->whereNull('teacher.deleted_at')->first();
        //$teacherprogram = DB::table('teacherprogram')->whereNull('deleted_at')->get();
       // $term  = DB::table('term')->whereNull('deleted_at')->get();
        
        $result_subjects = DB::select(DB::raw("SELECT subjects.sub_id,subjects.sub_code,subjects.sub_name,term.year as term_year,CONCAT(term.termn,'/',term.year) as t
        FROM `program`
        LEFT JOIN subjects ON(subjects.sub_id=program.sub_id)
        LEFT JOIN term ON(term.term_id=program.term_id)
        RIGHT JOIN (SELECT sub_id,count(sub_id) as total
        FROM `program`
        LEFT JOIN term ON(term.term_id=program.term_id)
        WHERE tea_id = {$currentuser->tea_id} and term.year IN('2562','2561','2560')
        GROUP BY sub_id
        HAVING total >= 3) as mytable ON(mytable.sub_id=program.sub_id)
        WHERE tea_id = {$currentuser->tea_id} and term.year IN('2562','2561','2560')
        ORDER BY sub_name asc,term.year DESC ,term.termn ASC"));

        $subjects = [];
        foreach($result_subjects as $sub)
        {
            if(!isset($subjects[$sub->sub_id]))
            {
                $subjects[$sub->sub_id] = [
                    'subject_id'=>$sub->sub_id,
                    'subject_code'=>$sub->sub_code,
                    'subject_name'=>$sub->sub_name,
                    'term'=>[$sub->t],
                    'year'=>[$sub->term_year]
                ];
            }
            else
            {
                if(!in_array( $sub->t, $subjects[$sub->sub_id]['term']))
                {
                    $subjects[$sub->sub_id]['term'][] = $sub->t;
                }
                if(!in_array($sub->term_year, $subjects[$sub->sub_id]['year']))
                {
                    $subjects[$sub->sub_id]['year'][] = $sub->term_year;
                }
            }
        }
        $subjects = array_values($subjects);
        $subjects = array_filter($subjects,function($item){
            return count($item['year']) >=3;
        });
        $subjects = array_values($subjects);

        return view('req::form',compact('academic','document','profressor','teacherprogram','term','subjects'));
    }
    public function store(Request $request)
    {
        $note = $request->get('note');
        $complete_year = $request->get('complete_year');
        $aca_id = $request->get('aca_id');
        $doc_id = $request->get('doc_id');
        $sub_id = $request->get('sub_id');
        $select_study = $request->get('select_study');
        $select_book = $request->get('select_book');
        $select_text = $request->get('select_text');
        $documents = $request->get('document');
        $position = $request->get('position');
        $currentuser = CurrentUser::user();

        if(!empty($complete_year) && is_numeric($sub_id))
        {
            $select_study=!empty($select_study) ?'Y':'N';
            $select_book=!empty($select_book) ?'Y':'N';
            $select_text=!empty($select_text) ?'Y':'N';
            if($select_study=='Y' && $select_book=='Y' && $select_text=='Y'){
                return MyResponse::error('เลือกเกิน');
            }elseif($select_study=='N' && $select_book=='N' && $select_text=='N'){
                return MyResponse::error('กรุณาเลือกอย่างใดอย่างหนึ่ง');
            }
                DB::table('request')->insert([
                    'note' =>$note,
                    'complete_year' =>$complete_year,
                    'position' =>$position,
                    'select_study' =>$select_study,
                    'select_book' =>$select_book,
                    'select_text' =>$select_text,
                    'aca_id' =>$aca_id,
                    'doc_id' =>$doc_id,
                    'sub_id' =>$sub_id,
                    'tea_id' =>$currentuser->tea_id,
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
            $requests = DB::table('request')->where('req_id',$req_id)->first();
            if(!empty($requests))
            {
                $academic = DB::table('academic')->whereNull('deleted_at')->get();
                $documents = DB::table('document')->whereNull('deleted_at')->get();
                $teacherprogram = DB::table('teacherprogram')->whereNull('deleted_at')->get();
                $subjects = DB::table('subjects')->whereNull('deleted_at')->get();
                $term = DB::table('term')->whereNull('deleted_at')->get();
                $profressor = DB::table('teacher')
                ->leftJoin('academic','teacher.aca_id','academic.aca_id')
                ->leftJoin('document','teacher.doc_id','document.doc_id')
                ->leftJoin('subjects','request.sub_id','subjects.sub_id')
                ->leftJoin('term','request.term_id','term.term_id')
                ->leftJoin('teacherprogram','request.teapro_id','teacherprogram.teapro_id')
                ->where('tea_id','=',$requests->tea_id)->whereNull('teacher.deleted_at')->first();
                return view('req::form',[
                    'requests'=>$requests,
                    'academic'=>$academic,
                    'documents'=>$documents,
                    'teacher'=>$teacher,
                    'teacherprogram'=>$teacherprogram,
                    'term'=>$term,
                    'subjects'=>$subjects,
                    'profressor'=>$profressor
                ]);
            }
        }
        return view('data-not-found',['back_url'=>'/request']);
    }
    
    public function update($req_id,Request $request)
    {
        if(is_numeric($req_id))
        {
            $req_name = $request->get('req_name');
            $note = $request->get('note');
            $complete_year = $request->get('complete_year');

            if(!empty($req_name) && !empty($note) && !empty($complete_year))
            {
                DB::table('request')->where('req_id',$req_id)->update([
                    'req_name' =>$req_name,
                    'note' =>$note,
                    'complete_year' =>$complete_year,
                    'updated_at' =>date('Y-m-d H:i:s'),
                ]);
               
                return MyResponse::success('ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว','/request');
            }else{
                return MyResponse::error('กรุณาป้อนข้อมูลให้ครบ');
            }
        }
        
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }

    public function destroy($req_id)
    {
        if(is_numeric($req_id))
        {
            DB::table('request')->where('req_id',$req_id)->update([
                'deleted_at' =>date('Y-m-d H:i:s'),
            ]);
            return MyResponse::success('ระบบได้ลบข้อมูลเรียบร้อยแล้ว');
        }
        return MyResponse::error('ป้อนข้อมูลไม่ถูกต้อง');
    }
}