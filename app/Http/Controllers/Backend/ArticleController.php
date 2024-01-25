<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{ 
    
public function view(){
    $category=Category::all();
    $user=User::all();
    return view('backend.pages.article.create',compact('user','category'));
}

public function show(){
    $article=Article::all();
    return view('backend.pages.article.list',compact('article'));
}


public function store(Request $request)
{
$validator = Validator::make($request->all(), [
    'category_id' => 'required|exists:categories,id',
    'title' => 'required|string',
    'date' => 'required|date',
    'user_id' => 'required|exists:users,id',
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
$article = Article::create([
    'title' => $request->input('title'),
    'category_id' => $request->input('category_id'),
    'user_id' => $request->input('user_id'),
    'date' => $request->input('date'),
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

    $file->move('uploads/article/', $filename);

    $article->image = $filename;
    $article->save();
}

return redirect()->route('article-list')->with('info', 'Data Added Successfully');
}


public function delete(Request $request,$id)
{
    $del= $request->id;
    $article = Article::find($del);
    $path='uploads/article/'.$article->image;
    if(File::exists($path)){
      File::delete($path);
    }
    $article->delete();
    return redirect()->back()->with('warning', 'Deleted  Successfully');
}


public function edit($id){
    $category=Category::all();
    $user=User::all();
    $article=Article::find($id);
    return view('backend.pages.article.edit',compact('article','user','category'));

}
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'category_id' => 'required|exists:categories,id',
        'user_id' => 'required|exists:users,id',
        'title' => 'required|string',
        'date' => 'required|date',
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

    $article = Article::findOrFail($id);
    $slug = Str::slug($request->input('title'));
    $cleanDescription = strip_tags($request->input('description'));
    $cleanmetaDescription = strip_tags($request->input('meta_description'));

    $article->title = $request->input('title');
    $article->category_id = $request->input('category_id');
    $article->user_id = $request->input('user_id');
    $article->date = $request->input('date');
    $article->slug = $slug;
    $article->description =  $cleanDescription ;
    $article->videourl = $request->input('videourl');
    $article->meta_title = $request->input('meta_title');
    $article->meta_keyword = $request->input('meta_keyword');
    $article->meta_description =$cleanmetaDescription;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;

        $file->move('uploads/article/', $filename);

        // Delete the previous image file if it exists
        if (!empty($article->image)) {
            $oldImagePath = 'uploads/article/' . $article->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $article->image = $filename;
    }

    $article->save();

    return redirect()->route('article-list')->with('info', 'Data Updated Successfully');
}

}
