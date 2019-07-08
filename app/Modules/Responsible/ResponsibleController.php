<?php

namespace App\Modules\Responsible;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class ResponsibleController extends Controller
{
    public function index()
    {
        return view('res::index2');
    }
}