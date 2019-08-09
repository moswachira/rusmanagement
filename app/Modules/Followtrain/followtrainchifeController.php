<?php
namespace App\Modules\Followtrain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
use App\Services\CurrentUser;
class FollowtrainchifeController extends Controller
{
    public function index(Request $request)
    {
        $followtrain = DB::table('followtrain')
        ->select('followtrain.*','teacher.first_name','teacher.last_name','side.side_name')
        ->leftJoin('training','followtrain.tra_id','training.tra_id')
        ->leftJoin('teacher','teacher.tea_id','training.tea_id')
        ->leftJoin('side','followtrain.side_id','side.side_id')
        ->whereNull('followtrain.deleted_at')->paginate(25);
        
        return view('fot::listforchife',compact('followtrain'));
    }
}