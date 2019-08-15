<?php
namespace App\Modules\Follow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
use App\Services\CurrentUser;
class FollowchifeController extends Controller
{
    public function index(Request $request)
    {
        $follow = DB::table('follow')
        ->select('follow.*','teacher.first_name','teacher.last_name')
        ->leftJoin('education','follow.edu_id','education.edu_id')
        ->leftJoin('teacher','teacher.tea_id','education.tea_id')
        ->whereNull('follow.deleted_at')->paginate(25);
        
        return view('fow::listchife',compact('follow'));
    }
}