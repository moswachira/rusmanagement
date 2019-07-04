<?php

namespace App\Modules\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        return view('product::product');
    }
}