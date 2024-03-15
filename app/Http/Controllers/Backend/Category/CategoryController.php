<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        
        
        return redirect()->back()->with('success', 'Category added successfully');
    
    }
    
}
