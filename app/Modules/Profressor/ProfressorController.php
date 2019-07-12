<?php

namespace App\Modules\Profressor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class ProfressorController extends Controller
{
    public function index()
    {
        $teacher = DB::table('teacher')->paginate(5);
        return view('pro::list',compact('teacher'));
    }

    public function create()
    {
        return view('pro::form');
    }
}