<?php

namespace App\Modules\Right;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class RightController extends Controller
{
    public function index()
    {
        $right = DB::table('right')->paginate(3);
        return view('rig::rightform',compact('right'));
    }
}