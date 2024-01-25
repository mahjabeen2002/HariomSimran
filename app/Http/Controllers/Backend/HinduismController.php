<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hinduism;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class HinduismController extends Controller
{ 
    public function view(){
    $category=Category::all();
    return view('backend.pages.hinduism.create',compact('category'));
}

public function show(){
    $hinduism=Hinduism::all();
    return view('backend.pages.hinduism.list',compact('hinduism'));
}


public function store(Request $request)
{
$validator = Validator::make($request->all(), [
    'category_id' => 'required|exists:categories,id',
    'title' => 'required|string',
    'description' => 'required',
    'image' => 'required|mimes:jpg,jpeg,png',
    'videourl' => 'required',
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
$hinduism = Hinduism::create([
    'title' => $request->input('title'),
    'category_id' => $request->input('category_id'),
    'slug'=> $slug,
    'description' => $cleanDescription,
    'videourl' => $request->input('videourl'),
    'meta_title' => $request->input('meta_title'),
    'meta_keyword' => $request->input('meta_keyword'),
    'meta_description' => $cleanmetaDescription,
]);

if ($request->hasFile('image')) {
    $file = $request->file('image');
    $ext = $file->getClientOriginalExtension();
    $filename = time() . '.' . $ext;

    $file->move('uploads/hinduism/', $filename);

    $hinduism->image = $filename;
    $hinduism->save();
}

return redirect()->route('hinduism-list')->with('info', 'Data Added Successfully');
}


public function delete(Request $request,$id)
{
    $del= $request->id;
    $hinduism = Hinduism::find($del);
    $path='uploads/hinduism/'.$hinduism->image;
    if(File::exists($path)){
      File::delete($path);
    }
    $hinduism->delete();
    return redirect()->back()->with('warning', 'Deleted  Successfully');
}


public function edit($id){
    $hinduism=Hinduism::find($id);
    $category=Category::all();
    return view('backend.pages.hinduism.edit',compact('hinduism','category'));

}
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'category_id' => 'required|exists:categories,id',
        'title' => 'required|string',
        'description' => 'required',
        'image' => 'nullable|mimes:jpg,jpeg,png',
        'videourl' => 'required',
        'meta_title' => 'required|string',
        'meta_keyword' => 'required|string',
        'meta_description' => 'required|string',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $hinduism = Hinduism::findOrFail($id);
    $slug = Str::slug($request->input('title'));
    $cleanDescription = strip_tags($request->input('description'));
    $cleanmetaDescription = strip_tags($request->input('meta_description'));

    $hinduism->title = $request->input('title');
    $hinduism->category_id = $request->input('category_id');
    $hinduism->slug = $slug;
    $hinduism->description =  $cleanDescription ;
    $hinduism->videourl = $request->input('videourl');
    $hinduism->meta_title = $request->input('meta_title');
    $hinduism->meta_keyword = $request->input('meta_keyword');
    $hinduism->meta_description =$cleanmetaDescription;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;

        $file->move('uploads/hinduism/', $filename);

        // Delete the previous image file if it exists
        if (!empty($hinduism->image)) {
            $oldImagePath = 'uploads/hinduism/' . $hinduism->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $hinduism->image = $filename;
    }

    $hinduism->save();

    return redirect()->route('hinduism-list')->with('info', 'Data Updated Successfully');
}

}
