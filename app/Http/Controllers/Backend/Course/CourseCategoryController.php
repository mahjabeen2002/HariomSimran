<?php

namespace App\Http\Controllers\Backend\Course;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CourseCategoryController extends Controller
{
    public function show()
    {
        $coursecategory = CourseCategory::all();
        return view('backend.pages.course.coursecategory.index', compact('coursecategory'));
    }

    public function view()
    {
        return view('backend.pages.course.coursecategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $slug = Str::slug($request->input('name'));
        $cleanDescription = strip_tags($request->input('short_description'));
       $coursecategory= CourseCategory::create([
         'name'=>$request->input('name'),
         'slug'=>$slug,
         'short_description' => $cleanDescription,
        ]);

        if ($request->hasFile('image')) {
            // Handle image upload only if it's present in the request
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/coursecategory/', $filename);
    
            $coursecategory->image = $filename;
            $coursecategory->save();
        }

        return redirect()->route('coursecategory-list')
            ->with('success', 'CourseCategory created successfully');
    }

    public function edit($id)
    {
        $coursecategory=CourseCategory::find($id);
        return view('backend.pages.course.coursecategory.edit', compact('coursecategory'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'short_description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png',
           
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $coursecategory = CourseCategory::findOrFail($id);
        $cleanDescription = strip_tags($request->input('short_description'));
        $slug = Str::slug($request->input('name'));



        $coursecategory->name = $request->input('name');
        $coursecategory->slug=$slug;
        $coursecategory->short_description =  $cleanDescription ;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/coursecategory/', $filename);
    
            // Delete the previous image file if it exists
            if (!empty($coursecategory->image)) {
                $oldImagePath = 'uploads/coursecategory/' . $coursecategory->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $coursecategory->image = $filename;
        }
    
        $coursecategory->save();

        return redirect()->route('coursecategory-list')->with('info', 'Data Updated Successfully');
    }
   

    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $coursecategory = CourseCategory::find($del);
        $path='uploads/coursecategory/'.$coursecategory->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $coursecategory->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }
}
