<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function createCategoryForm(){
        return view('backend.pages.category.add');
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
    
}
