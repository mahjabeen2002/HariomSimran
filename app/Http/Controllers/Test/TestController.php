<?php

namespace App\Http\Controllers\Test;

use App\Models\Test;
use App\Models\Subject;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function show()
    {
        $tests = Test::with('subject')->get();
    
        return view('backend.pages.tests.index', compact('tests'));
    }

    public function view()
    {
        $department=Department::get();
        $subjects = Subject::get();
        // dd($department,$subjects);
        return view('backend.pages.tests.create', compact('subjects','department'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject_id' => 'required|exists:subjects,id',
            'department_id' => 'required|exists:departments,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'level' => 'required|in:beginner,intermediate,expert',
            'time_dur' => 'required|string',
            'total_mcq' => 'required|string',
            'pass_marks' => 'required|string',
            'total_marks' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $test = Test::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'time_dur' => $request->input('time_dur'),
            'total_mcq' => $request->input('total_mcq'),
            'pass_marks' => $request->input('pass_marks'),
            'total_marks' => $request->input('total_marks'),
            'subject_id' => $request->input('subject_id'),
            'department_id' => $request->input('department_id'),
            'level' => $request->level ?? 'beginner' ?? 'intermediate' ?? 'expert',
        ]);

        return redirect()->route('test-list')->with('info', 'Test Added Successfully');
    }
   

    public function edit($id){
        // Find the department
        $departments = Department::all();
    
        // Find the test
        $test = Test::find($id);
    
        // Get all subjects
        $subjects = Subject::all();
    
        return view('backend.pages.tests.edit', compact('subjects', 'test', 'departments'));
    }
    
    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'subject_id' => 'required|exists:subjects,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'level' => 'required|in:beginner,intermediate,expert',
            'time_dur' => 'required|string',
            'total_mcq' => 'required|string',
            'pass_marks' => 'required|string',
            'total_marks' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $test = Test::findOrFail($id);

        $test->title = $request->input('title');
        $test->description = $request->input('description');
        $test->time_dur = $request->input('time_dur');
        $test->total_mcq = $request->input('total_mcq');
        $test->pass_marks = $request->input('pass_marks');
        $test->subject_id = $request->input('subject_id');
        $test->level = $request->level ?? 'beginner' ?? 'intermediate' ?? 'expert';

        $test->Update();

        return redirect()->route('test-list')->with('info', 'Test Updated Successfully');
    }



    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $test = Test::find($del);
       
        $test->delete();
        
        return redirect()->back()->with('warning', ' Test Deleted  Successfully');
    }



    public function getSubjects($departmentId)
    {
        $subjects = Subject::where('department_id', $departmentId)->pluck('name', 'id');
        return response()->json($subjects);
    }
}