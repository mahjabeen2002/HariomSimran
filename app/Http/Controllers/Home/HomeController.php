<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use App\Models\Lecture;
use App\Models\CourseSubCategory;
use App\Models\CourseDetails;
use App\Models\CourseReview;
use App\Models\Katha;
use App\Models\Hinduism;
use App\Models\TempleHistory;
use App\Models\MediaCenter;
use App\Models\SindhiTipno;
use App\Models\Article;
use App\Models\Certificate;
use App\Models\Event;
use App\Models\JobClassified;

use App\Models\CourseCategory;
use App\Models\Contactus;
use App\Models\Category;
use App\Models\BusinessPromotion;
use App\Models\Story;
use App\Models\Collaboration;
use App\Models\Announcement;
use App\Models\Membership;
use App\Models\User;
use App\Models\Department;
use App\Models\joingroup;
use App\Models\creategroup;
use App\Models\groupmessage;
use App\Models\Library;
use App\Models\LibraryCategory;

class HomeController extends Controller
{
    public function mainpage()
    {
        $media = MediaCenter::all();
        $course = CourseCategory::limit(3)->get();
        $event = Event::limit(2)->get();
        $collaboration = Collaboration::limit(4)->get();
        $announcement = Announcement::limit(4)->get();
        $article = Article::limit(4)->get();
        // $fetchnft = nfttbl::where('status',1)->limit(4)->get();
        // $story = Story::limit(4)->get();
        $jobclassified = JobClassified::limit(4)->get();
        $businesspromotion = BusinessPromotion::limit(4)->get();
        $hinduism = Hinduism::all();
        $katha = Katha::all();
        $library = Library::all();
        $librarycategory = LibraryCategory::all();
        // $cart = carttbl::limit(3)->get();
        $department = Department::limit(3)->get();
        $templehistory = TempleHistory::all();
        $category = Category::all();
        // $group = creategroup::where('status',1)->orderBy('id', 'DESC')->get();
        return view('userside.mainpage', compact('media','course','event',
        'collaboration','announcement','article','jobclassified','businesspromotion',
        'hinduism','katha','department','library','librarycategory','templehistory', 'category'));
    }
    public function layout()
    {
        return view('userside.layout');
    }

    public function Navbar(Request $req)
    {

        $data = DB::table("course_sub_categories")->OrderBy('id')->get();

            return response()->json(['data' => $data]);

    }

    public function categorylist(Request $req)
    {
       $id = $req->post("id");
       $show = DB::table('course_categories')->where("category_id",$id)->get();
       return response()->json(['show' => $show]);

    }

    public function eventcat(Request $req)
    {
        $data12 = DB::table("events")->select('category_id')->distinct('category_id')->get();
          foreach($data12 as $d)
          {
            $data1[] = DB::table("categories")->where('id',$d->category_id)->first();
          }
            return response()->json(['data1' => $data1]);
    }

    public function mediacat(Request $req)
    {
        $datam1 = DB::table("mediacenters")->select('category_id')->distinct('category_id')->get();
          foreach($datam1 as $d)
          {
            $datam[] = DB::table("categories")->where('id',$d->category_id)->first();
          }
            return response()->json(['datam' => $datam]);
    }

    public function collabcat(Request $req)
    {
        $datac1 = DB::table("collaborations")->select('category_id')->distinct('category_id')->get();
          foreach($datac1 as $d)
          {
            $datac[] = DB::table("categories")->where('id',$d->category_id)->first();
          }
            return response()->json(['datac' => $datac]);
    }

    public function artcat(Request $req)
    {
        $dataa1 = DB::table("articles")->select('category_id')->distinct('category_id')->get();
          foreach($dataa1 as $d)
          {
            $dataa[] = DB::table("categories")->where('id',$d->category_id)->first();
          }
            return response()->json(['dataa' => $dataa]);
    }

    // public function storycat(Request $req)
    // {
    //     $datas1 = DB::table("cstorytbls")->select('category_id')->distinct('category_id')->get();
    //       foreach($datas1 as $d)
    //       {
    //         $datas[] = DB::table("categories")->where('id',$d->category_id)->first();
    //       }
    //         return response()->json(['datas' => $datas]);
    // }
    public function hindicat(Request $req)
    {
        $datas1 = DB::table("hinduisms")->select('category_id')->distinct('category_id')->get();
          foreach($datas1 as $d)
          {
            $datas[] = DB::table("categories")->where('id',$d->category_id)->first();
          }
            return response()->json(['datas' => $datas]);
    }

    public function temcat(Request $req)
    {
        $datas1 = DB::table("temple_histories")->select('category_id')->distinct('category_id')->get();
          foreach($datas1 as $d)
          {
            $datas[] = DB::table("categories")->where('id',$d->category_id)->first();
          }
            return response()->json(['datas' => $datas]);
    }


    public function allhinduism()
    {
        $fetchacat = Category::all();
        $fetchmedia = Hinduism::paginate(6);
        $fetchc = Hinduism::count();
        return view('userside.allhinduism', compact('fetchmedia','fetchacat','fetchc'));
    }

    public function hinduism($slug)
    {  $fetchacat = Category::all();
        $fetchmedia = Hinduism::where('category_id',$slug)->paginate(6);
        $fetchc = Hinduism::where('category_id',$slug)->count();
        return view('userside.hinduism', compact('fetchmedia','fetchc','fetchacat'));
    }
    public function hinduismdetail($slug)
    {
        $fetchmediade = Hinduism::where('slug',$slug)->first();
        return view('userside.hinduismdetail', compact('fetchmediade'));
    }
    public function mediacenter()
    {
        $fetchc = MediaCenter::count();
        $mediacenter = MediaCenter::paginate(6);
        return view('userside.mediacenter', compact('mediacenter','fetchc'));
    }

    public function mediacenterdetail($slug)
    {
        $related = MediaCenter::where('slug', '!=', $slug)->limit(8)->get();
        $mediacenter = MediaCenter::where('slug', $slug)->first();
        return view('userside.mediacenterdetail', compact('related', 'mediacenter'));
    }

    public function allarticle()
    {
        $fetchacat = Category::all();
        $fetchart = Article::paginate(6);
        $fetchc = Article::count();
        return view('userside.allarticle', compact('fetchart','fetchacat','fetchc'));
    }

    public function article($slug)
    {  $fetchacat = Category::all();
        $fetchart = Article::where('category_id',$slug)->paginate(6);
        $fetchc = Article::where('category_id',$slug)->count();
        return view('userside.article', compact('fetchart','fetchc','fetchacat'));
    }
    public function articledetail($slug)
    {
        $fetchart = Article::where('slug',$slug)->first();
        return view('userside.articledetail', compact('fetchart'));
    }
    
    public function allcollaboration()
    {
        $fetchacat = Category::all();
        $fetch = Collaboration::paginate(6);
        $fetchc = Collaboration::count();
        return view('userside.allcollaboration', compact('fetch','fetchacat','fetchc'));
    }

    public function collaboration($slug)
    {  $fetchacat = Category::all();
        $fetch = Collaboration::where('category_id',$slug)->paginate(6);
        $fetchc = Collaboration::where('category_id',$slug)->count();
        return view('userside.collaboration', compact('fetch','fetchc','fetchacat'));
    }
    public function collaborationdetail($slug)
    {
        $fetch = Collaboration::where('slug',$slug)->first();
        return view('userside.collaborationdetail', compact('fetch'));
    }
    public function allkatha()
    {
        $fetchacat = Category::all();
        $fetch = Katha::paginate(6);
        $fetchc = Katha::count();
        return view('userside.allkatha', compact('fetch','fetchacat','fetchc'));
    }

    public function katha($slug)
    {  $fetchacat = Category::all();
        $fetch = Katha::where('category_id',$slug)->paginate(6);
        $fetchc = Katha::where('category_id',$slug)->count();
        return view('userside.katha', compact('fetch','fetchc','fetchacat'));
    }
    public function kathadetail($slug)
    {
        $fetch = Katha::where('slug',$slug)->first();
        return view('userside.kathadetail', compact('fetch'));
    }

    public function ourcouse()
    {
        $courses = CourseSubCategory::all();
        return view('userside.courses', compact('courses'));
    }

    public function courseDetails($slug)
    {
        $subCategory = CourseSubCategory::where('slug', $slug)
            ->with(['lectures', 'materials', 'reviews']) // Include the 'reviews' relationship
            ->firstOrFail();

        $courseDetails = CourseDetails::where('subcategory_id', $subCategory->id)->firstOrFail();
        $relatedCourses = CourseDetails::where('subcategory_id', $subCategory->id)
            ->where('id', '!=', $courseDetails->id)
            ->limit(6)
            ->get();

        $lectureCount = Lecture::where('course_subcategory_id', $subCategory->id)->count();

        return view('userside.coursedetail', compact('subCategory', 'courseDetails', 'relatedCourses', 'lectureCount'));
    }


    public function reviewstore(Request $request)
    {
        $request->validate([
            'course_subcategory_id' => 'required|exists:course_sub_categories,id',
            'comment' => 'required',
            'rating' => 'required|integer|between:1,5',
        ]);

        $user = auth()->user();

        $review = new CourseReview([
            'user_id' => $user->id,
            'course_subcategory_id' => $request->course_subcategory_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
            'status' => 'active', // Adjust as needed
        ]);

        $review->save();

        return redirect()->back()->with('success', 'Review added successfully.');
    }

}
