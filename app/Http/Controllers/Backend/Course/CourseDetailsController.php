<?php

namespace App\Http\Controllers\Backend\Course;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\CourseDetails;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CourseDetailsController extends Controller
{
    public  function view(){
        $categories=CourseCategory::all();
        $subcategory=CourseSubCategory::all();
        $instructor=Instructor::all();
        return view('backend.pages.course.coursedetail.create',compact('subcategory','categories','instructor'));
    }



    public  function show(){
        $coursedetails=CourseDetails::all();
        return view('backend.pages.course.coursedetail.list',compact('coursedetails'));
    }




    public function store(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:course_categories,id',
            'subcategory_id' => 'required|exists:course_sub_categories,id',
            'instructor_id' => 'required|exists:instructors,id',
            'course_description' => 'required',
            'what_you_will_learn' => 'required',
            'certification_description' => 'required|string',
            'language' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $cleanDescription = strip_tags($request->input('course_description'));
        $cleanLearn = strip_tags($request->input('what_you_will_learn'));
        $cleanCertificate = strip_tags($request->input('certification_description'));
    

    
        $coursetopic = CourseDetails::create([
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('subcategory_id'),
            'instructor_id' => $request->input('instructor_id'),
            'language' => $request->input('language'),
            'course_description' => $cleanDescription,
            'what_you_will_learn' => $cleanLearn,
            'certification_description' => $cleanCertificate,
           
        ]);
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/coursedetail/', $filename);
    
            $coursetopic->image = $filename;
            $coursetopic->save();
        }
    
        return redirect()->route('coursedetail-list')->with("info", "Course Details Added Successfully!!!");
    }

    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $coursedetails = CourseDetails::find($del);
        $path='uploads/coursedetail/'.$coursedetails->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $coursedetails->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }



  


    public function edit($id)
    {
        $categories = CourseCategory::all();
        $subcategories = CourseSubCategory::all();
        $instructor = Instructor::all();
        $coursedetail = CourseDetails::findOrFail($id);

        return view('backend.pages.course.coursedetail.edit', compact('categories', 'subcategories', 'coursedetail','instructor'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:course_categories,id',
            'subcategory_id' => 'required|exists:course_sub_categories,id',
            'instructor_id' => 'required|exists:instructors,id',
            'course_description' => 'required',
            'what_you_will_learn' => 'required',
            'certification_description' => 'required|string',
            'language' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $coursedetail = CourseDetails::findOrFail($id);

        $cleanDescription = strip_tags($request->input('course_description'));
        $cleanLearn = strip_tags($request->input('what_you_will_learn'));
        $cleanCertificate = strip_tags($request->input('certification_description'));


        $coursedetail->update([
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('subcategory_id'),
            'instructor_id' => $request->input('instructor_id'),
            'language' => $request->input('language'),
            'course_description' => $cleanDescription,
            'what_you_will_learn' => $cleanLearn,
            'certification_description' => $cleanCertificate,
          
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/coursedetail/', $filename);

            $coursedetail->image = $filename;
            $coursedetail->save();
        }

        return redirect()->route('coursedetail-list')->with("info", "Course Details Updated Successfully!!!");
    }

    
}
