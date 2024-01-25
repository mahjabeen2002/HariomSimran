<?php

namespace App\Http\Controllers\Backend;


use App\Models\MediaCenter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class MediaCenterController extends Controller
{
    public function view(){
        return view('backend.pages.mediacenter.create');
    }

    public function show(){
        $mediacenter=MediaCenter::all();
        return view('backend.pages.mediacenter.list',compact('mediacenter'));
    }


    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
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
    $mediacenter = MediaCenter::create([
        'title' => $request->input('title'),
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

        $file->move('uploads/mediacenter/', $filename);

        $mediacenter->image = $filename;
        $mediacenter->save();
    }

    return redirect()->route('mediacenter-list')->with('info', 'Data Added Successfully');
}


    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $mediacenter = MediaCenter::find($del);
        $path='uploads/mediacenter/'.$mediacenter->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $mediacenter->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }


    public function edit($id){
        $mediacenter=MediaCenter::find($id);
        return view('backend.pages.mediacenter.edit',compact('mediacenter'));

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
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
    
        $mediacenter = MediaCenter::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        $cleanDescription = strip_tags($request->input('description'));
        $cleanmetaDescription = strip_tags($request->input('meta_description'));
    
        $mediacenter->title = $request->input('title');
        $mediacenter->slug = $slug;
        $mediacenter->description =  $cleanDescription ;
        $mediacenter->videourl = $request->input('videourl');
        $mediacenter->meta_title = $request->input('meta_title');
        $mediacenter->meta_keyword = $request->input('meta_keyword');
        $mediacenter->meta_description =$cleanmetaDescription;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/mediacenter/', $filename);
    
            // Delete the previous image file if it exists
            if (!empty($mediacenter->image)) {
                $oldImagePath = 'uploads/mediacenter/' . $mediacenter->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $mediacenter->image = $filename;
        }
    
        $mediacenter->save();

        return redirect()->route('mediacenter-list')->with('info', 'Data Updated Successfully');
    }

    
}
