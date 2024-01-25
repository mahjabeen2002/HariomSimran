<?php

namespace App\Http\Controllers\Backend\Course;

use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CourseInstructorController extends Controller
{
    
    public function view(){
        return view('backend.pages.instructor.create');
    }

    public function show(){
        $Instructor=Instructor::all();
        return view('backend.pages.instructor.list',compact('Instructor'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|unique:users|email:rfc,dns',
            'profile_picture' => 'required|mimes:jpg,jpeg,png',
            'bio' => 'required|string',
            'phone' => 'required|string',
            'skills' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $cleanDescription = strip_tags($request->input('bio'));

        $Instructor = Instructor::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'skills' => $request->input('skills'),
            'bio' => $cleanDescription,

        ]);
    
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/Instructor/', $filename);
    
            $Instructor->profile_picture = $filename;
            $Instructor->save();
        }
    
        return redirect()->route('instructor-list')->with('info', 'Data Added Successfully');
    }

    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $Instructor = Instructor::find($del);
        $path='uploads/Instructor/'.$Instructor->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $Instructor->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }


    public function edit($id){
        $Instructor=Instructor::find($id);
        return view('backend.pages.instructor.edit',compact('Instructor'));

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|unique:users|email:rfc,dns',
            'profile_picture' => 'nullable|mimes:jpg,jpeg,png',
            'bio' => 'required|string',
            'phone' => 'required|string',
            'skills' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $Instructor = Instructor::findOrFail($id);
        $cleanDescription = strip_tags($request->input('bio'));
    
        $Instructor->name = $request->input('name');
        $Instructor->email = $request->input('email');
        $Instructor->phone = $request->input('phone');
        $Instructor->skills = $request->input('skills');
        $Instructor->bio = $cleanDescription;


    
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/Instructor/', $filename);
    
            // Delete the previous image file if it exists
            if (!empty($Instructor->profile_picture)) {
                $oldImagePath = 'uploads/Instructor/' . $Instructor->profile_picture;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $Instructor->profile_picture = $filename;
        }
    
        $Instructor->save();

        return redirect()->route('instructor-list')->with('info', 'Data Updated Successfully');
    }
}
