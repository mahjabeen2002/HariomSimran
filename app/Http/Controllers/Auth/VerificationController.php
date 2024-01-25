<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;


class VerificationController extends Controller
{

    public function show()
    {
        return view('auth.verify-email');
    }

    public function verify(Request $request, $id, $hash)
    {
        $user = User::find($id);
    
        if (! $user || ! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            // The verification link is not valid.
            return redirect('/register')->with('error', 'Invalid verification link.');
        }
    
        if ($user->hasVerifiedEmail()) {
            // User already verified.
            return redirect('/register')->with('warning', 'Email address already verified.');
        }
    
        $user->markEmailAsVerified();
        event(new Verified($user));
    
        return redirect('/home')->with('success', 'Email address verified successfully. You can now enjoy your account.');
    }
 
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            // User already verified.
            return redirect('/home')->with('warning', 'Email address already verified.');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true)->with('success', 'Verification email sent. Please check your inbox.');
    }

}
