<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
            'category_id' => $request->category_id,
            'type' => $request->type
        ]);


        return redirect()->back()->with('success', 'Product has been Added');
    }
    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted Successfully');
    }
    public function editProduct($id){
        $product = Product::find($id);
        $categories = Category::get();
        return view('backend.pages.product.edit', compact('product','categories'));
    }

    public function updateProduct(Request $request, $id){
        $product = Product::find($id);
    
        if($request->hasFile('image') && $request->file('image')->isValid()){
            File::delete(public_path('images/'.$product->image));
            $imageName = $request->name . '.' . $request->image->extension();
            $request->image->move('images/', $imageName);
            $product->image = $imageName;
        }
        
        $product->name = $request->name;
        $product->price = $request->price;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->category_id = $request->category_id;
        $product->type = $request->type;
        $product->save();
    
        return redirect()->back()->with('success', 'Product updated successfully');
    }
    


}
