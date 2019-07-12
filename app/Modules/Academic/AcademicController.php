<?php

namespace App\Modules\Academic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class AcademicController extends Controller
{
    public function listacademic()
    {
        return view('aca::listaca');
    }
    public function formacademic()
    {
        return view('aca::formaca');
    }
}