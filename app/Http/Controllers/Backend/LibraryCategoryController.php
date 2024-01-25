<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LibraryCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class LibraryCategoryController extends Controller
{
    public function view(){
        return view('backend.pages.librarycategory.create');
    }

    public function show(){
        $category=LibraryCategory::all();
        return view('backend.pages.librarycategory.list',compact('category'));
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

  

    $category = new LibraryCategory();
    $category->slug = $slug;
    $category->title = $request->title;

    $category->save();
    return redirect()->route('librarycategory-list')->with('info', 'Data Added Successfully');
}


    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $category = LibraryCategory::find($del);
        $path='uploads/category/'.$category->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $category->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }


    public function edit($id){
        $category=LibraryCategory::find($id);
        return view('backend.pages.librarycategory.edit',compact('category'));

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
           
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $category = LibraryCategory::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        
      
        $category->title = $request->input('title');
        $category->slug = $slug;
        
    
        $category->save();

        return redirect()->route('librarycategory-list')->with('info', 'Data Updated Successfully');
    }

}
