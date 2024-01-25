<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminSettingController extends Controller
{ 
    
    Public function youraccount()
    {
        $f = DB::table('users')->where('id', Auth::id())->first();
                return view('backend.pages.setting.youraccount',compact('f'));
    }
    Public function setting($id)
    {
        $f = User::find($id);
        return view('backend.pages.setting.setting', compact('f'));
    }
    public function settingpost(Request $req, $id)
    {
        $user = User::find($id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->address = $req->address ?? "null";
        $user->phone_number = $req->phone_number ?? "null";

        if ($req->hasFile('profile_image')) {
            $file = $req->file('profile_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('userimages/', $filename);
    
            // Delete the previous image file if it exists
            if (!empty($user->profile_image)) {
                $oldImagePath = 'profile_image/' . $user->profile_image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $user->profile_image = $filename;
        }
    
   

        $user->save();
        
        return redirect('/admin-youraccount')->with('info', "Your Data Has Been Updated...");
  
    
    }
    
 
    
    Public function changepasswordget(){
        return view('backend.pages.setting.changepassword');
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
    
    return redirect()->route('admin-dashboard')->with('success', 'Password changed successfully.');
    }
    
}
