<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collaboration;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CollaborationController extends Controller
{
    public function view(){
        $category=Category::all();
        return view('backend.pages.collaboration.create',compact('category'));
    }

    public function show(){
        $collaboration=Collaboration::all();
        return view('backend.pages.collaboration.list',compact('collaboration'));
    }


    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'category_id' => 'required|exists:categories,id',
        'title' => 'required|string',
        'date' => 'required|date',
        'description' => 'required',
        'image' => 'required|mimes:jpg,jpeg,png',
        'meta_title' => 'required|string',
        'meta_keyword' => 'required|string',
        'meta_description' => 'required|string',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $slug = Str::slug($request->input('title'));

    $cleanDescription = strip_tags($request->input('description'));
    $cleanmetaDescription = strip_tags($request->input('meta_description'));
    $collaboration = Collaboration::create([
        'title' => $request->input('title'),
        'category_id' => $request->input('category_id'),
        'date' => $request->input('date'),
        'slug'=> $slug,
        'description' => $cleanDescription,
        'meta_title' => $request->input('meta_title'),
        'meta_keyword' => $request->input('meta_keyword'),
        'meta_description' => $cleanmetaDescription,
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;

        $file->move('uploads/collaboration/', $filename);

        $collaboration->image = $filename;
        $collaboration->save();
    }

    return redirect()->route('collaboration-list')->with('info', 'Data Added Successfully');
}


    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $collaboration = Collaboration::find($del);
        $path='uploads/collaboration/'.$collaboration->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $collaboration->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }


    public function edit($id){
        $collaboration=Collaboration::find($id);
        $category=Category::all();
        return view('backend.pages.collaboration.edit',compact('collaboration','category'));

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'date' => 'required|date',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $collaboration = Collaboration::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        $cleanDescription = strip_tags($request->input('description'));
        $cleanmetaDescription = strip_tags($request->input('meta_description'));
    
        $collaboration->title = $request->input('title');
        $collaboration->category_id = $request->input('category_id');
        $collaboration->date = $request->input('date');
        $collaboration->slug = $slug;
        $collaboration->description =  $cleanDescription ;
        $collaboration->meta_title = $request->input('meta_title');
        $collaboration->meta_keyword = $request->input('meta_keyword');
        $collaboration->meta_description =$cleanmetaDescription;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/collaboration/', $filename);
    
            // Delete the previous image file if it exists
            if (!empty($collaboration->image)) {
                $oldImagePath = 'uploads/collaboration/' . $collaboration->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $collaboration->image = $filename;
        }
    
        $collaboration->save();

        return redirect()->route('collaboration-list')->with('info', 'Data Updated Successfully');
    }

}
