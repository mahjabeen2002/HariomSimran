<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Katha;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class KathaController extends Controller
{
    public function view(){
        $category=Category::all();
        return view('backend.pages.katha.create',compact('category'));
    }
    
    public function show(){
        $katha=Katha::all();
        return view('backend.pages.katha.list',compact('katha'));
    }
    
    
    public function store(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'category_id' => 'required|exists:categories,id',
        'title' => 'required|string',
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
    $katha = Katha::create([
        'title' => $request->input('title'),
        'category_id' => $request->input('category_id'),
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
    
        $file->move('uploads/katha/', $filename);
    
        $katha->image = $filename;
        $katha->save();
    }
    
    return redirect()->route('katha-list')->with('info', 'Data Added Successfully');
    }
    
    
    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $katha = Katha::find($del);
        $path='uploads/katha/'.$katha->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $katha->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }
    
    
    public function edit($id){
        $katha=Katha::find($id);
        $category=Category::all();
        return view('backend.pages.katha.edit',compact('katha','category'));
    
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $katha = Katha::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        $cleanDescription = strip_tags($request->input('description'));
        $cleanmetaDescription = strip_tags($request->input('meta_description'));
    
        $katha->title = $request->input('title');
        $katha->category_id = $request->input('category_id');
        $katha->slug = $slug;
        $katha->description =  $cleanDescription;
        $katha->meta_title = $request->input('meta_title');
        $katha->meta_keyword = $request->input('meta_keyword');
        $katha->meta_description =$cleanmetaDescription;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/katha/', $filename);
    
            // Delete the previous image file if it exists
            if (!empty($katha->image)) {
                $oldImagePath = 'uploads/katha/' . $katha->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $katha->image = $filename;
        }
    
        $katha->save();
    
        return redirect()->route('katha-list')->with('info', 'Data Updated Successfully');
    }
    
    }
    