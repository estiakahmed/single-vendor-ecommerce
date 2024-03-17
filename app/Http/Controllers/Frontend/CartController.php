<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request){

        Cart::create([
            'ip_address' => $request->ip(),
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'price' => $request->price
        ]);

        return redirect()->back()->with('success', 'Product added to Cart');
    }
}
