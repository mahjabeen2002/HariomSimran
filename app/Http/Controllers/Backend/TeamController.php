<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function view(){
        return view('backend.pages.team.create');
    }
    
    public function show(){
        $team=Team::all();
        return view('backend.pages.team.list',compact('team'));
    }
    
    
    public function store(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'designation' => 'required|string',
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
    $team = Team::create([
        'title' => $request->input('title'),
        'designation' => $request->input('designation'),
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
    
        $file->move('uploads/team/', $filename);
    
        $team->image = $filename;
        $team->save();
    }
    
    return redirect()->route('team-list')->with('info', 'Data Added Successfully');
    }
    
    
    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $team = Team::find($del);
        $path='uploads/team/'.$team->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $team->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }
    
    
    public function edit($id){
        $team=Team::find($id);
       
        return view('backend.pages.team.edit',compact('team'));
    
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'designation' => 'required|string',
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
    
        $team = Team::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        $cleanDescription = strip_tags($request->input('description'));
        $cleanmetaDescription = strip_tags($request->input('meta_description'));
    
        $team->title = $request->input('title');
        $team->designation = $request->input('designation');
        $team->slug = $slug;
        $team->description =  $cleanDescription;
        $team->meta_title = $request->input('meta_title');
        $team->meta_keyword = $request->input('meta_keyword');
        $team->meta_description =$cleanmetaDescription;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/team/', $filename);
    
            // Delete the previous image file if it exists
            if (!empty($team->image)) {
                $oldImagePath = 'uploads/team/' . $team->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $team->image = $filename;
        }
    
        $team->save();
    
        return redirect()->route('team-list')->with('info', 'Data Updated Successfully');
    }
     

}
