<?php

namespace App\Http\Controllers\Backend\Course;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\CourseSubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CourseMaterialsController extends Controller
{
    public  function view(){
        $subcategory=CourseSubCategory::all();
        return view('backend.pages.materials.create',compact('subcategory'));
    }

    public  function show(){
        $materails=Material::all();
        return view('backend.pages.materials.index',compact('materails'));
    }




    public function store(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'course_subcategory_id' => 'required|exists:course_sub_categories,id',
            'description' => 'required|string',
            'title' => 'required|string',
            'file' => 'required|mimes:pdf,doc,docx,txt,jpg,jpeg,png|max:2048', 
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $cleanDescription = strip_tags($request->input('description'));
    
        $material = Material::create([
            'course_subcategory_id' => $request->input('course_subcategory_id'),
            'title' => $request->input('title'),
            'description' => $cleanDescription,
            'file' => '', // Initially set an empty string
        ]);
    
     

        if ($request->hasFile('file')) {
            // Handle image upload only if it's present in the request
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/coursematerial/', $filename);
    
            $material->file = $filename;
            $material->save();
        }
    
        return redirect()->route('material-list')->with("info", "Course Details Added Successfully!!!");
    }
    

    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $materials = Material::find($del);
    
        $materials->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }



  


    public function edit($id)
    {
    
        $subcategories = CourseSubCategory::all();
        $materials = Material::findOrFail($id);
        return view('backend.pages.materials.edit', compact('materials', 'subcategories'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'course_subcategory_id' => 'required|exists:course_sub_categories,id',
            'description' => 'required|string',
            'title' => 'required|string',
            'file' => 'nullable|mimes:pdf,doc,docx,txt,jpg,jpeg,png|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $cleanDescription = strip_tags($request->input('description'));
    
        $material = Material::findOrFail($id);
    
        $material->update([
            'course_subcategory_id' => $request->input('course_subcategory_id'),
            'title' => $request->input('title'),
            'description' => $cleanDescription,
        ]);
    

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/coursematerial/', $filename);

            $material->file = $filename;
            $material->save();
        }



       
    
        return redirect()->route('material-list')->with("info", "Course Details Updated Successfully!!!");
    }
    
    

    public function download($id)
    {
        $material = Material::findOrFail($id);
    
        // Assuming 'file' column contains the file path in your database
        $filePath = public_path('uploads/coursematerial/' . $material->file);

    
        // You can add more logic to check file existence, permissions, etc.
    
        return response()->download($filePath, $material->file);
    }


}
