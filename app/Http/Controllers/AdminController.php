<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('admin.index', ['products' => $products]);
    }
}
