<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function addProduct(){
        $categories = Category::get();
        return view('backend.pages.product.add', compact('categories'));
    }
    public function manageProduct(){
        $products = Product::with('category')->get();
        return view('backend.pages.product.manage',compact('products'));
    }
    public function storeProduct(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'price' => 'required|numeric|min:0.01',
            'image' => 'required|image|max:2048',
            'short_description' => 'required',
            'long_description' => 'required',
            'category_id' => 'required | integer' 
        ]);

        $imageName = $request->name . '.'. $request->image->extension();
        $request->image->move('images/', $imageName);


        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imageName,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'category_id' => $request->category_id
        ]);


        return redirect()->back()->with('success', 'Product has been Added');
    }
    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted Successfully');
    }
    public function editProduct(){
        return view('backend.pages.product.edit');
    }


}
