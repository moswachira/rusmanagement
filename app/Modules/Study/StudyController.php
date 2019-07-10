<?php

namespace App\Modules\Study;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class StudyController extends Controller
{
    public function index()
    {
        return view('stu::studyform1');
    }
}