<?php

namespace App\Http\Controllers\Backend;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function create(){
        return view('backend.pages.department.create');
    }


    public function Index(){
        $departments=Department::all();
        return view('backend.pages.department.index',compact('departments'));
    }


    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'depart_name'=>'required|string',
        ]);

        $slug = Str::slug($request->input('depart_name'));
        $department=Department::create([
          'depart_name'=>$request->depart_name,
          'slug' => $slug,
        ]);



        return redirect()->route('department-list')->with('info','Department Created Successfully');

    }


    public function delete (Request $request ,$id){
        $department=Department::find($id);
        $department->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }


    public function edit($id){
        $department=Department::find($id);
        return view('backend.pages.department.edit',compact('department'));
    }


    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'depart_name'=>'required|string',
        ]);
      

        $department=Department::find($id);
        $slug = Str::slug($request->input('depart_name'));
        $department->update([
            'depart_name' => $request->input('depart_name'),
            $department->slug = $slug,
        ]);


        return redirect()->route('department-list')->with('info','Department Updated successfully');
    }
}
