<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class AnnouncementController extends Controller
{
    public function view(){
        $category=Category::all();
        return view('backend.pages.announcement.create',compact('category'));
    }

    public function show(){
        $announcement=Announcement::all();
        return view('backend.pages.announcement.list',compact('announcement'));
    }


    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'category_id' => 'required|exists:categories,id',
        'title' => 'required|string',
        'date' => 'required|date',
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
    $announcement = Announcement::create([
        'title' => $request->input('title'),
        'category_id' => $request->input('category_id'),
        'date' => $request->input('date'),
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

        $file->move('uploads/announcement/', $filename);

        $announcement->image = $filename;
        $announcement->save();
    }

    return redirect()->route('announcement-list')->with('info', 'Data Added Successfully');
}


    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $announcement = Announcement::find($del);
        $path='uploads/announcement/'.$announcement->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $announcement->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }


    public function edit($id){
        $announcement=Announcement::find($id);
        $category=Category::all();
        return view('backend.pages.announcement.edit',compact('announcement','category'));

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'date' => 'required|date',
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
    
        $announcement = Announcement::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        $cleanDescription = strip_tags($request->input('description'));
        $cleanmetaDescription = strip_tags($request->input('meta_description'));
    
        $announcement->title = $request->input('title');
        $announcement->category_id = $request->input('category_id');
        $announcement->date = $request->input('date');
        $announcement->slug = $slug;
        $announcement->description =  $cleanDescription ;
        $announcement->videourl = $request->input('videourl');
        $announcement->meta_title = $request->input('meta_title');
        $announcement->meta_keyword = $request->input('meta_keyword');
        $announcement->meta_description =$cleanmetaDescription;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/announcement/', $filename);
    
            // Delete the previous image file if it exists
            if (!empty($announcement->image)) {
                $oldImagePath = 'uploads/announcement/' . $announcement->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $announcement->image = $filename;
        }
    
        $announcement->save();

        return redirect()->route('announcement-list')->with('info', 'Data Updated Successfully');
    }

}
