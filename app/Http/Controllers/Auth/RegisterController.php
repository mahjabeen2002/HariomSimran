<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function view(){
        return view('userside.auth.register');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email:rfc,dns',
            'age' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'required|min:8|',
        ]);
    
        // Handle profile image upload
        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            $file->move('uploads/User/', $filename);
        }
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'role' => 'User',
            'status' => 'active',
            'image' => $filename,
        ]);
    
       
    
        // Manually send the email verification notification
        // $user->sendEmailVerificationNotification();
    
        // Redirect to the registration form with a message
        return redirect('register')->with('message', 'Please check your email for verification.');
    }
    
    

}
