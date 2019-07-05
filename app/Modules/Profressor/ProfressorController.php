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
        return view('pro::list');
    }

    public function create()
    {
        return view('pro::form');
    }
}