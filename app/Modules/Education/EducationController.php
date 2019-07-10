<?php

namespace App\Modules\Education;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class EducationController extends Controller
{
    public function index()
    {
        return view('edu::eduform1');
    }
    public function finish()
    {
        return view('edu2::eduform2');
    }
}