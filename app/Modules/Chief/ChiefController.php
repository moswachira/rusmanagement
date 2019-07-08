<?php

namespace App\Modules\Chief;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class ChiefController extends Controller
{
    public function index()
    {
        return view('chi::index3');
    }
}