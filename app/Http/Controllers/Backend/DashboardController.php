<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\ContactUs;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\DailyTestResult;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  public function index(){
    $total_user= User::all()->count();
    return view('backend.pages.index',compact('total_user' ));
  }

  
Public function allUsers(){
  $alluseres= User::all();

  return view('backend.pages.users',compact('alluseres'));
}


public function deleteUser(Request $request,$id){
$users=User::find($id);
$users->delete();
 return redirect()->back()->with('warning','User Delete Successfully');
   
}



function user_update($id)
{
$p = DB::table('users')->select('status')->where('id', '=', $id)->first();
if($p->status == 'active')
{
  $status = 'inactive';
}
else
{
  $status = 'active';
}
$values = array('status' =>  $status);
DB::table('users')->where('id', $id)->update($values);
return redirect()->back()->with('mesg',"Status Has Been Updated...");
}

public function Contactuslist(){
  $contactus=ContactUs::all();
  return view('backend.pages.contact.list',compact('contactus'));
}

public function contactusdelete(Request $request,$id)
{
    $del= $request->id;
    $contactus = ContactUs::find($del);
   
    $contactus->delete();
    return redirect()->back()->with('warning', 'Deleted  Successfully');
}

public function testimonials()
{
$testimonial= Testimonial::all();
return view('backend.pages.testimonial.list',compact('testimonial'));
}
public function testimonialdelete(Request $request,$id)
{
$del= $request->id;
$testimonial = Testimonial::find($del);

$testimonial->delete();
return redirect()->back()->with('warning', 'Deleted  Successfully');
}


public function dailyquizleaderboardshow(){
  $leaderboard = DailyTestResult::with('dailyquiz')->orderByDesc('marks_obtained')->get();
  return view('backend.pages.dailyquiz.leaderboard', compact('leaderboard'));
}






public function dailyquizleaderboarddelete($id){
  $data=DailyTestResult::find($id);
  $data->delete();
  return redirect()->back()->with('warning', 'Message Delete Successfully');
}
}
