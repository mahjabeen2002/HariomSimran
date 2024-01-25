<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\JobClassified;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class JobClassifiedController extends Controller
{
    
    public function view()
    {
        $country=Country::all();
        return view('backend.pages.jobclassified.create',compact('country'));
    }

    public function show()
    {
        $jobclassified=JobClassified::all();
        $country=Country::all();

        return view('backend.pages.jobclassified.list',compact('jobclassified','country'));
    
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'nullable',
            'image' => 'required|mimes:jpg,jpeg,png',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
            'countryid' => 'required|exists:countries,id',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $slug = Str::slug($request->input('title'));
        $cleanDescription = strip_tags($request->input('description'));
        $cleanmetaDescription = strip_tags($request->input('meta_description'));
    
        $jobclassified = JobClassified::create([
            'title' => $request->input('title'),
            'slug' => $slug,
            'countryid' => $request->input('countryid'),
            'description' => $cleanDescription,
            'meta_title' => $request->input('meta_title'),
            'meta_keyword' => $request->input('meta_keyword'),
            'meta_description' => $cleanmetaDescription,
        ]);
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/jobclassified/', $filename);
    
            $jobclassified->image = $filename;
            $jobclassified->save();
        }
    
        return redirect()->route('jobclassified-list')->with('info', 'Data Added Successfully');
    }

    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $jobclassified = JobClassified::find($del);
        $path='uploads/jobclassified/'.$jobclassified->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $jobclassified->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }


    public function edit($id){
        $jobclassified=JobClassified::find($id);
        $country=Country::all();
        return view('backend.pages.jobclassified.edit',compact('jobclassified','country'));

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'nullable',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
            'countryid' => 'required|exists:countries,id',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $jobclassified = JobClassified::findOrFail($id);
    
        $slug = Str::slug($request->input('title'));

            
        $cleanDescription = strip_tags($request->input('description'));
        $cleanmetaDescription = strip_tags($request->input('meta_description'));
        $jobclassified->countryid = $request->input('countryid');
        $jobclassified->title = $request->input('title');
        $jobclassified->slug = $slug;
        $jobclassified->description =  $cleanDescription;
        $jobclassified->meta_title = $request->input('meta_title');
        $jobclassified->meta_keyword = $request->input('meta_keyword');
        $jobclassified->meta_description =  $cleanmetaDescription;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/jobclassified/', $filename);
    
            // Delete the previous image file if it exists
            if (!empty($jobclassified->image)) {
                $oldImagePath = 'uploads/jobclassified/' . $jobclassified->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $jobclassified->image = $filename;
        }
    
        $jobclassified->save();

        return redirect()->route('jobclassified-list')->with('info', 'Data Updated Successfully');
    }
}
