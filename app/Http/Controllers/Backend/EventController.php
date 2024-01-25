<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public function view(){
        $category=Category::all();
        return view('backend.pages.event.create',compact('category'));
    }

    public function show(){
        $event=Event::all();
        return view('backend.pages.event.list',compact('event'));
    }


    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'category_id' => 'required|exists:categories,id',
        'title' => 'required|string',
        'date' => 'required|date',
        'description' => 'required',
        'image' => 'required|mimes:jpg,jpeg,png',
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
    $event = Event::create([
        'title' => $request->input('title'),
        'category_id' => $request->input('category_id'),
        'date' => $request->input('date'),
        'slug'=> $slug,
        'description' => $cleanDescription,
        'meta_title' => $request->input('meta_title'),
        'meta_keyword' => $request->input('meta_keyword'),
        'meta_description' => $cleanmetaDescription,
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;

        $file->move('uploads/event/', $filename);

        $event->image = $filename;
        $event->save();
    }

    return redirect()->route('event-list')->with('info', 'Data Added Successfully');
}


    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $event = Event::find($del);
        $path='uploads/event/'.$event->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $event->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }


    public function edit($id){
        $event=Event::find($id);
        $category=Category::all();
        return view('backend.pages.event.edit',compact('event','category'));

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'date' => 'required|date',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $event = Event::findOrFail($id);
        $slug = Str::slug($request->input('title'));
        $cleanDescription = strip_tags($request->input('description'));
        $cleanmetaDescription = strip_tags($request->input('meta_description'));
    
        $event->title = $request->input('title');
        $event->category_id = $request->input('category_id');
        $event->date = $request->input('date');
        $event->slug = $slug;
        $event->description =  $cleanDescription ;
        $event->meta_title = $request->input('meta_title');
        $event->meta_keyword = $request->input('meta_keyword');
        $event->meta_description =$cleanmetaDescription;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/event/', $filename);
    
            // Delete the previous image file if it exists
            if (!empty($event->image)) {
                $oldImagePath = 'uploads/event/' . $event->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $event->image = $filename;
        }
    
        $event->save();

        return redirect()->route('event-list')->with('info', 'Data Updated Successfully');
    }

}
