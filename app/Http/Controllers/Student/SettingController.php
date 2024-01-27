<?php

namespace App\Http\Controllers\Student;

use App\Models\City;
use App\Models\User;
use App\Models\School;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    Public function youraccount()
    {
        $users = DB::table('users')->where('id', Auth::id())->first();
                return view('studentdashboard.pages.setting.youraccount',compact('users'));
    }
    // Public function setting($id)
    // {
    //     $city = City::all();
    //     $school = School::all();
    //     $country = Country::all();
    //     $user = User::find($id);
    //     return view('studentdashboard.pages.setting.setting', compact('user','city','school','country'));
    // }
    public function settingpost(Request $req, $id)
    {
        $user = User::find($id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone_number = $req->phone_number;
        $user->address = $req->address;
        $user->age = $req->age;

        $user->country_id = $req->country_id;
        $user->city_id = $req->city_id;
        $user->school_id = $req->school_id;
        $user->otherschool = $req->otherschool ?? 'null';
        if($req->file('profile_image'))
        {
        $image=$req->file('profile_image');
        $ext = rand().".".$image->getClientOriginalName();
        $image->move('uploads/Students/',$ext);
        $user->profile_image=$ext;
           }
           else
           {
            $user->profile_image= $user->profile_image;
           }

        $user->update();
        
        return redirect('/youraccount')->with('mesg', "Your Data Has Been Updated...");
  
    
    return redirect()->route('student-dashboard')->with('success', 'Password changed successfully.');
    }
    
 
    
    Public function changepasswordget(){
        return view('studentdashboard.pages.setting.changepassword');
    }
    
    
    public function changepassword(Request $request)
    {
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:6',
        'confirm_password' => 'required|same:new_password',
    ]);
    
    $user = auth()->user();
    
    if (!Hash::check($request->old_password, $user->password)) {
        return redirect()->back()->with('error', 'The old password is incorrect.');
    }
    
    $user->password = Hash::make($request->new_password);
    $user->save();
    
    return redirect()->route('student-dashboard')->with('success', 'Password changed successfully.');
    }
}
