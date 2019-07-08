<?php

namespace App\Modules\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home::index');
    }
    public function study()
    {
        return view('study::formstudy');
    }
    public function academic()
    {
        return view('academic::formacademic');
    }
    public function train()
    {
        return view('train::formtrain');
    }
}