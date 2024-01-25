<?php

namespace App\Http\Controllers\Test;

use App\Models\Subject;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function list()
    {
        $subjects = Subject::all();
        return view('backend.pages.subjects.index', compact('subjects'));
    }

    public function create()
    {

        $department=Department::get();
        return view('backend.pages.subjects.create',compact('department'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);
    
        
        $slug = Str::slug($request->input('name'));

        $subject = Subject::create([
            'name' => $request->input('name'),
            'slug'=>$slug,
            'department_id' => $request->input('department_id'),
        ]);
    
        return redirect()->route('subject-list')
            ->with('Info', 'Subject created successfully');
    }
    

    public function edit($id)
    {
        $departments=Department::get();
        $subject=Subject::find($id);
        return view('backend.pages.subjects.edit', compact('subject','departments'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $subject = Subject::findOrFail($id);
        $slug = Str::slug($request->input('name'));
        $subject->update([
            'name' => $request->input('name'),
            $subject->slug = $slug,
            'department_id' => $request->input('department_id'),
        ]);

        return redirect()->route('subject-list')->with('info', 'Subject Updated Successfully');
    }

    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $subject = Subject::find($del);
       
        $subject->delete();
        return redirect()->back()->with('warning', ' Subject Deleted  Successfully');
    }

  
}