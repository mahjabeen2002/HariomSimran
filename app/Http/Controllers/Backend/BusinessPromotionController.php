<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessPromotion;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class BusinessPromotionController extends Controller
{
    public function view(){
        return view('backend.pages.businesspromotion.create');
    }

    public function show(){
        $businesspromotion=BusinessPromotion::all();
        return view('backend.pages.businesspromotion.list',compact('businesspromotion'));
    }


    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'title' => 'required|string',
        'description' => 'required',
        'image' => 'required|mimes:jpg,jpeg,png',
        'videourl' => 'required',
        'meta_title' => 'required|string',
        'meta_keyword' => 'required|string',
        'meta_description' => 'required|string',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $slug = Str::slug($request->input('title'));

    $cleanDescription = strip_tags($request->input('description'));
    $cleanmetaDescription = strip_tags($request->input('meta_description'));
    $businesspromotion = BusinessPromotion::create([
        'title' => $request->input('title'),
        'slug'=> $slug,
        'description' => $cleanDescription,
        'videourl' => $request->input('videourl'),
        'meta_title' => $request->input('meta_title'),
        'meta_keyword' => $request->input('meta_keyword'),
        'meta_description' => $cleanmetaDescription,
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;

        $file->move('uploads/businesspromotion/', $filename);

        $businesspromotion->image = $filename;
        $businesspromotion->save();
    }

    return redirect()->route('businesspromotion-list')->with('info', 'Data Added Successfully');
}


    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $businesspromotion = BusinessPromotion::find($del);
        $path='uploads/businesspromotion/'.$businesspromotion->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $businesspromotion->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }


    public function edit($id){
        $businesspromotion=BusinessPromotion::find($id);
        return view('backend.pages.businesspromotion.edit',compact('businesspromotion'));

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'videourl' => 'required',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $businesspromotion = BusinessPromotion::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        $cleanDescription = strip_tags($request->input('description'));
        $cleanmetaDescription = strip_tags($request->input('meta_description'));
    
        $businesspromotion->title = $request->input('title');
        $businesspromotion->slug = $slug;
        $businesspromotion->description =  $cleanDescription ;
        $businesspromotion->videourl = $request->input('videourl');
        $businesspromotion->meta_title = $request->input('meta_title');
        $businesspromotion->meta_keyword = $request->input('meta_keyword');
        $businesspromotion->meta_description =$cleanmetaDescription;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/businesspromotion/', $filename);
    
            // Delete the previous image file if it exists
            if (!empty($businesspromotion->image)) {
                $oldImagePath = 'uploads/businesspromotion/' . $businesspromotion->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $businesspromotion->image = $filename;
        }
    
        $businesspromotion->save();

        return redirect()->route('businesspromotion-list')->with('info', 'Data Updated Successfully');
    }

}
