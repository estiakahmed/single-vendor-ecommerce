<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class frontendController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::all();
        return view('frontend.index', compact('categories','products'));
    }
}
