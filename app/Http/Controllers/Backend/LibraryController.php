<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LibraryCategory;
use App\Models\Library;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class LibraryController extends Controller
{
    public function view(){
        $category=LibraryCategory::all();
        return view('backend.pages.library.create',compact('category'));
    }
    
    public function show(){
        $library=Library::all();
        return view('backend.pages.library.list',compact('library'));
    }
    
    
    public function store(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'category_id' => 'required|exists:library_categories,id',
        'title' => 'required|string',
        'description' => 'required',
        'meta_title' => 'required|string',
        'meta_keyword' => 'required|string',
        'meta_description' => 'required|string',
        'file' => 'required|mimes:pdf,doc,docx,txt,jpg,jpeg,png|max:2048', 
    ]);
    
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $slug = Str::slug($request->input('title'));
    
    $cleanDescription = strip_tags($request->input('description'));
    $cleanmetaDescription = strip_tags($request->input('meta_description'));
    $library = Library::create([
        'title' => $request->input('title'),
        'category_id' => $request->input('category_id'),
        'slug'=> $slug,
        'description' => $cleanDescription,
        'meta_title' => $request->input('meta_title'),
        'meta_keyword' => $request->input('meta_keyword'),
        'meta_description' => $cleanmetaDescription,
        'file' => '', 
    ]);
    
    if ($request->hasFile('file')) {
        // Handle image upload only if it's present in the request
        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;

        $file->move('uploads/Library/', $filename);

        $library->file = $filename;
        $library->save();
    }
    
    return redirect()->route('library-list')->with('info', 'Data Added Successfully');
    }
    
    
    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $library = Library::find($del);
        $path='uploads/library/'.$library->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $library->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }
    
    
    public function edit($id){
        $library=Library::find($id);
        $category=LibraryCategory::all();
        return view('backend.pages.library.edit',compact('library','category'));
    
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:library_categories,id',
            'title' => 'required|string',
            'description' => 'required',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
            'file' => 'nullable|mimes:pdf,doc,docx,txt,jpg,jpeg,png|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $library = Library::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        $cleanDescription = strip_tags($request->input('description'));
        $cleanmetaDescription = strip_tags($request->input('meta_description'));
    
        $library->title = $request->input('title');
        $library->category_id = $request->input('category_id');
        $library->slug = $slug;
       
        $library->description =  $cleanDescription;
        $library->meta_title = $request->input('meta_title');
        $library->meta_keyword = $request->input('meta_keyword');

        $library->meta_description =$cleanmetaDescription;
       
        if ($request->hasFile('file')) {
            // Handle image upload only if it's present in the request
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/Library/', $filename);
    
            $library->file = $filename;
            $library->save();
        }
    

        $library->save();
    
        return redirect()->route('library-list')->with('info', 'Data Updated Successfully');
    }


    public function download($id)
    {
        $library = Library::findOrFail($id);
    
        // Assuming 'file' column contains the file path in your database
        $filePath = public_path('uploads/Library/' . $library->file);

    
        // You can add more logic to check file existence, permissions, etc.
    
        return response()->download($filePath, $library->file);
    }
    
    }
    