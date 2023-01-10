<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index(){
        //$posts = DB::table('posts')->get();
        $products = Product::get();

        return view('dashboard.index', ['products' => $products]);
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
