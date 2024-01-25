<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function view(){
        return view('backend.pages.category.create');
    }

    public function show(){
        $category=Category::all();
        return view('backend.pages.category.list',compact('category'));
    }


    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'title' => 'required|string',
      
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $slug = Str::slug($request->input('title'));

  

    $category = new Category();
    $category->slug = $slug;
    $category->title = $request->title;

    $category->save();
    return redirect()->route('category-list')->with('info', 'Data Added Successfully');
}


    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $category = Category::find($del);
        $path='uploads/category/'.$category->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $category->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }


    public function edit($id){
        $category=Category::find($id);
        return view('backend.pages.category.edit',compact('category'));

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
           
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $category = Category::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        
      
        $category->title = $request->input('title');
        $category->slug = $slug;
        
    
        $category->save();

        return redirect()->route('category-list')->with('info', 'Data Updated Successfully');
    }

}
