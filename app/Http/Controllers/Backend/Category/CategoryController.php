<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function createCategoryForm(){
        return view('backend.pages.category.add');
    }

    public function categoryManage(){

        $categories = Category::get();
        return view('backend.pages.category.manage', compact('categories'));
    }

    public function categoryStore(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|image'
        ]);

        $imageName = $request->name.'.'. $request->image->extension();
        $request->image->move('images/', $imageName);

        Category::create([
            'name' => $request->name,
            'image' => $imageName
        ]);
        session()->flash('success', 'category has been created');
        return redirect()->back();
    
    }

    public function categoryDelete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');

    }

    public function categoryEdit($id){
        $category = Category::find($id);
        return view('backend.pages.category.edit',compact('category'));
    }
    public function categoryUpdate(Request $request,$id){

        $category = Category::find($id);
        if($request->hasFile('image')){
            File::delete(public_path('images/'.$category->image));
            $imageName = $request->name .'.'. $request->image->extension();
            $request->image->move('images/', $imageName);
            $category->image = $imageName;
        }else{
            $imageName = $request->name .'.'. $request->image->extension();
            $request->image->move('images/', $imageName);
            $category->image = $imageName;
        }
        $category->name = $request->name;
        $category->save();

        return redirect()->back()->with('success', 'Category has been Updated');

    }
    
}
