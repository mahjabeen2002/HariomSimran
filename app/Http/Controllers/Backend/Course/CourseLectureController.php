<?php

namespace App\Http\Controllers\Backend\Course;

use App\Models\Lecture;
use Illuminate\Http\Request;
use App\Models\CourseSubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CourseLectureController extends Controller
{
    public  function view(){
        $subcategory=CourseSubCategory::all();
        return view('backend.pages.lectures.create',compact('subcategory'));
    }

    public  function show(){
        $lectures=Lecture::all();
        return view('backend.pages.lectures.index',compact('lectures'));
    }




    public function store(Request $request)
    { 

       
        $validator = Validator::make($request->all(), [
         
            'course_subcategory_id' => 'required|exists:course_sub_categories,id',
            'description' => 'required|string',
            'title' => 'required|string',
            'video_link' => 'required|string',
          
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $cleanDescription = strip_tags($request->input('description'));
      
    

    
        $lecture = Lecture::create([
            'course_subcategory_id' => $request->input('course_subcategory_id'),
            'title' => $request->input('title'),
            'video_link' => $request->input('video_link'),
            'description' => $cleanDescription,
         
           
        ]);

        // dd($lecture);
    
     
    
        return redirect()->route('lecture-list')->with("info", "Course Details Added Successfully!!!");
    }

    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $lecture = Lecture::find($del);
    
        $lecture->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }



  


    public function edit($id)
    {
    
        $subcategories = CourseSubCategory::all();
        $lecture = Lecture::findOrFail($id);
        return view('backend.pages.lectures.edit', compact('lecture', 'subcategories'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'course_subcategory_id' => 'required|exists:course_sub_categories,id',
            'description' => 'required|string',
            'title' => 'required|string',
            'video_link' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $lecture = Lecture::findOrFail($id);

        $cleanDescription = strip_tags($request->input('description'));


        $lecture->update([
            'course_subcategory_id' => $request->input('course_subcategory_id'),
            'title' => $request->input('title'),
            'video_link' => $request->input('video_link'),
            'description' => $cleanDescription,
          
        ]);

       

        return redirect()->route('lecture-list')->with("info", "Course Details Updated Successfully!!!");
    }
}
