<?php

namespace App\Modules\Soure;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class SoureController extends Controller
{
    public function soure()
    {
        $soure = DB::table('soure')->paginate(10);
        return view('sou::souform',compact('soure'));
    }
}