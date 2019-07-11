<?php

namespace App\Modules\Train;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class TrainController extends Controller
{
    public function index()
    {
        return view('tra::trainform1');
    }
}