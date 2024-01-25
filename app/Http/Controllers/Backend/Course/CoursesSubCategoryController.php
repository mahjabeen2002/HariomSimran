<?php

namespace App\Http\Controllers\Backend\Course;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CoursesSubCategoryController extends Controller
{
    public function show()
    {
        $subcategory = CourseSubCategory::all();
        return view('backend.pages.course.subcategory.index', compact('subcategory'));
    }

    public function view()
    {
        $category = CourseCategory::all();
        return view('backend.pages.course.subcategory.create',compact('category'));
    }

       
    


    public function store(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:course_categories,id',
            'title' => 'required|string',
            'course_duration' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png',
            'level' => 'required|in:Basic,Intermediate,Expert',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'description' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $slug = Str::slug($request->input('title'));
        $cleanDescription = strip_tags($request->input('description'));
        $coursetopic = CourseSubCategory::create([
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'slug' => $slug,
            'course_duration' => $request->input('course_duration'),
            'level' => $request->input('level') ?? 'Basic', 
            'original_price' => $request->input('original_price'),
            'selling_price' => $request->input('selling_price'),
            'description' => $cleanDescription,
        ]);
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/subcategory/', $filename);
    
            $coursetopic->image = $filename;
            $coursetopic->save();
        }
    
        return redirect()->route('coursesubcategory-list')->with("info", "Course SubCategory Added Successfully!!!");
    }
    
    public function edit($id)
    {
        $subcategory = CourseSubCategory::with('category')->find($id);
        $categories = CourseCategory::all();
        
        // dd($categories, $subcategory);
        return view('backend.pages.course.subcategory.edit', compact('subcategory', 'categories'));
    }
    
    
    

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:course_categories,id',
            'title' => 'required|string',
            'course_duration' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'level' => 'required|in:Basic,Intermediate,Expert',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'description' => 'required',

            
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
       
        $coursetopic = CourseSubCategory::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        $cleanDescription = strip_tags($request->input('description'));
       $coursetopic->title = $request->input('title');
       $coursetopic->course_duration = $request->input('course_duration');
       $coursetopic->category_id = $request->category_id;
       $coursetopic->level = $request->level ?? 'Basic' ?? 'Intermediate' ?? 'Expert';
       $coursetopic->original_price = $request->input('original_price');
       $coursetopic->selling_price = $request->input('selling_price');
       $coursetopic->slug=$slug;
       $coursetopic->description =  $cleanDescription ;

       if ($request->hasFile('image')) {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;

        $file->move('uploads/subcategory/', $filename);

        // Delete the previous image file if it exists
        if (!empty($coursetopic->image)) {
            $oldImagePath = 'uploads/subcategory/' . $coursetopic->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $coursetopic->image = $filename;
    }

    $coursetopic->update();
    
        return redirect()->route('coursesubcategory-list')->with('info', 'Data Updated Successfully');
    }
   

    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $coursetopic = CourseSubCategory::find($del);
        $path='uploads/subcategory/'.$coursetopic->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $coursetopic->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }
}
