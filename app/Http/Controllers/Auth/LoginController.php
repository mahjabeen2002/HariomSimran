<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DailyQuestion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view(){
        return view('frontend.pages.auth.login');
    }


    // public function userLogin()
    // {
    //     if (Auth::check()) {
    //         if (Auth::user()->role == User::ROLE_STUDENT) {
    //             return view('frontend.pages.index')->with('message', 'Welcome to The CozaStore ');
    //         }
    //     } else {
    //         return view('frontend.pages.auth.login');
    //     }
    // }


    public function userLogin()
    {
        if (Auth::check()) {
            if (Auth::user()->role == User::ROLE_STUDENT) {
                event(new \App\Events\UserLoggedIn(Auth::user()));
                return view('frontend.pages.index')->with('message', 'Welcome to The Brain Battle Academy');
            }
        } else {
            return view('frontend.pages.auth.login');
        }
    }
    
    


    private function redirectToRole($role)
    {

        switch ($role) {
            case User::ROLE_ADMIN:
                return redirect()->route('admin.dashboard');
            case User::ROLE_MANAGER:
                return redirect()->route('manager.dashboard');
            default:
                return redirect()->route('home');
        }
    }

    // public function userAuthenticate(Request $request)


    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required'
    //     ]);


    //     if (Auth::attempt($request->only('email', 'password'))) {
    //         if (!Auth::user()->role == User::ROLE_STUDENT) {
    //             Auth::logout();
    //             return back()->with('error', 'Only user can access here.');
    //         }
    //         return redirect('home')->with('message', 'Welcome to The Brain Battle Academy ');
    //     }
    //     return back()->with('error', 'The given credentials are invalid');
    // }


    public function userAuthenticate(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();

        if (!$user->role == User::ROLE_STUDENT) {
            Auth::logout();
            return back()->with('error', 'Only users with role "Student" can access here.');
        }

        // Update last login time
        $user->update(['last_login_at' => now()]);

        return redirect('home')->with('message', 'Welcome to The Brain Battle Academy');
    }

    return back()->with('error', 'The given credentials are invalid');
}



}
