<?php

namespace App\Http\Controllers\Student;

use App\Models\AttemptsTest;
use Illuminate\Http\Request;
use App\Models\DailyTestResult;
use App\Http\Controllers\Controller;

class StudentDashboardController extends Controller
{
    Public function index(){
        return view('studentdashboard.pages.index');
    }



    Public function show(){
        $leaderboard=AttemptsTest::where('user_id', auth()->id())->get();
        return view('studentdashboard.pages.leaderboard.list',compact('leaderboard'));
    }


    public function delete($id){
        $leaderboard=AttemptsTest::find($id);
        $leaderboard->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }



    Public function dailyquizresultshow(){
        $dailyquiz=DailyTestResult::where('user_id', auth()->id())->get();
        return view('studentdashboard.pages.dailyquiz.list',compact('dailyquiz'));
    }


    public function dailyquizresultdelete($id){
        $dailyquiz=DailyTestResult::find($id);
        $dailyquiz->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }
}
