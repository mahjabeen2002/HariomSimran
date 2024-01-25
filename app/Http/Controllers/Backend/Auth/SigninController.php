<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SigninController extends Controller
{
    public function view()
    {
        if (Auth::check() && Auth::user()->role == User::ROLE_ADMIN) {
            return view('backend.pages.index');
        } else {
            return view('backend.pages.auth.login');
        }
    }

    //new code

    
    public function adminAuthenticate(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'

        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            if (!(Auth::user()->role == User::ROLE_ADMIN)) {
                Auth::logout();
                return redirect()->back()->withErrors(['errors' => 'Only admin can access here.']);
            }
            return redirect()->route('admin-dashboard')->with('message', 'Welcome to The Admin Panel');
        }

        return redirect()->back()->withErrors(['errors' => 'The given credentials are invalid']);
    }


    public function adminlogout(){
        Auth::logout();
        Session::flush();
        return redirect('/admin/login');
    }
}
