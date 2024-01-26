<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\DailyQuestion;
use App\Http\Controllers\Controller;
use App\Models\DailyOption;

use Illuminate\Database\Eloquent\ModelNotFoundException;
class DailyQuizController extends Controller
{
    public function view(){
        return view('backend.pages.dailyquiz.create');
    }

    public function list(){
        $dailyquiz = DailyQuestion::with('dailyOptions')->get();
        return view('backend.pages.dailyquiz.list', compact('dailyquiz'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'question_name' => 'required',
            'optionA' => 'required',
            'optionB' => 'required',
            'optionC' => 'required',
            'optionD' => 'required',
            'correct_option' => 'required',
            'marks' => 'required|integer',
            'time_duration' => 'required',
        ]);
    
        // Store the question
        $question = DailyQuestion::create([
            'question_name' => $request->input('question_name'),
            'marks' => $request->input('marks'),
            'time_duration' => $request->input('time_duration'),
        ]);
    
        // Store the options
        $options = [
            'optionA' => $request->input('optionA'),
            'optionB' => $request->input('optionB'),
            'optionC' => $request->input('optionC'),
            'optionD' => $request->input('optionD'),
            'correct_opt' => strtoupper($request->input('correct_option')), // Convert to uppercase
        ];
        
        $question->dailyOptions()->create($options);
    
        return redirect()->route('dailyquiz-list')->with('info', 'Question created successfully');
    }
    
    
    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $question = DailyQuestion::find($del);
       
        $question->delete();
        $option = DailyOption::where('question_id',$id)->first();
        $option->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }



    public function edit($id)
{
    $question = DailyQuestion::with('dailyOptions')->find($id);
    return view('backend.pages.dailyquiz.edit', compact('question'));
}


public function update(Request $request, $id)
{
    try {
        $request->validate([
            'question_name' => 'required',
            'marks' => 'required|integer',
            'time_duration' => 'required',
            'options.*.correct_option' => 'required', // Validation for correct_option in each option
        ]);

        $question = DailyQuestion::findOrFail($id);

        $question->update([
            'question_name' => $request->input('question_name'),
            'marks' => $request->input('marks'),
            'time_duration' => $request->input('time_duration'),
        ]);

        // Loop through each option and update or create
        foreach ($request->input('options') as $key => $optionData) {
            $question->dailyOptions()->updateOrCreate(
                ['id' => $key],
                [
                    'optionA' => $optionData['optionA'],
                    'optionB' => $optionData['optionB'],
                    'optionC' => $optionData['optionC'],
                    'optionD' => $optionData['optionD'],
                    'correct_opt' => strtoupper($optionData['correct_option']), // Convert to uppercase
                ]
            );
        }

        return redirect()->route('dailyquiz-list')->with('info', 'Question updated successfully');
    } catch (ModelNotFoundException $e) {
        return redirect()->route('dailyquiz-list')->with('error', 'Question not found.');
    } catch (\Exception $e) {
        return redirect()->route('dailyquiz-list')->with('error', 'An error occurred while updating the question. ' . $e->getMessage());
    }
}






}
