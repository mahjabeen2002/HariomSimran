<?php

namespace App\Http\Controllers\Test;

use Log;
use App\Models\Test;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    
    

    


    public function list(Test $test)
    {
        $questions = Question::all();
        return view('backend.pages.questions.index', compact('test', 'questions'));
    }

    public function create()
    {
        $tests = Test::with('subject')->get();
        return view('backend.pages.questions.create', compact('tests'));
    }
    

   
  


    public function store(Request $request)
    {
        try {
            $request->validate([
                'test_id' => 'required|exists:tests,id',
                'questions.*.question' => 'required|string|max:255',
                'questions.*.marks' => 'required|integer|min:1',
                'questions.*.options.A' => 'required|string|max:255',
                'questions.*.options.B' => 'required|string|max:255',
                'questions.*.options.C' => 'required|string|max:255',
                'questions.*.options.D' => 'required|string|max:255',
                'questions.*.correctOpt' => 'required|string', // Remove 'max:1'
            ]);
    
            $requestData = $request->all();
    
            // Loop through each question and its options
            foreach ($requestData['questions'] as $questionData) {
                try {
                    // Create a new question
                    $question = new Question();
                    $question->test_id = $requestData['test_id'];
                    $question->question = $questionData['question'];
                    $question->marks = $questionData['marks'];
                    $question->save();
    
                    // Create options for the question
                    $option = new Option();
                    $option->question_id = $question->id;
                    $option->optionA = $questionData['options']['A'];
                    $option->optionB = $questionData['options']['B'];
                    $option->optionC = $questionData['options']['C'];
                    $option->optionD = $questionData['options']['D'];
    
                    // Store the actual value selected by the user in correct_opt
                    $correctOpt = strtoupper($questionData['correctOpt']);
                    $option->correct_opt = $correctOpt;
    
                    $option->save();
    
                    Log::info("Processed question:", [
                        'question' => $questionData['question'],
                        'marks' => $questionData['marks'],
                        'optionA' => $questionData['options']['A'],
                        'optionB' => $questionData['options']['B'],
                        'optionC' => $questionData['options']['C'],
                        'optionD' => $questionData['options']['D'],
                        'correctOpt' => $correctOpt,
                    ]);
                } catch (\Exception $e) {
                    Log::error("Error processing question:", [
                        'exception' => $e,
                        'message' => $e->getMessage(),
                        'trace' => $e->getTraceAsString(),
                    ]);
                }
            }
    
            Log::info('Questions and Options added successfully.');
    
            // Redirect with success message
            return redirect()->route('question-list')->with('success', 'Questions and options added successfully.');
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::error('Error during data processing:', [
                'exception' => $e,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
    
            // Handle the exception gracefully and redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
    
    



    public function edit($id)
    {
        
        $question = Question::findOrFail($id);
        $tests = Test::all();
        return view('backend.pages.questions.edit', compact('tests', 'question'));
    }

 

    public function update(Request $request, $id)
    {
        try {
            // Validate the request data
            $request->validate([
                'test_id' => 'required|exists:tests,id',
                'questions.*.question' => 'required|string|max:255',
                'questions.*.marks' => 'required|integer|min:1',
                'questions.*.optionA' => 'required|string|max:255',
                'questions.*.optionB' => 'required|string|max:255',
                'questions.*.optionC' => 'required|string|max:255',
                'questions.*.optionD' => 'required|string|max:255',
                'questions.*.correctOpt' => [
                    'required',
                    'string',
                    'max:255', // Assuming a reasonable maximum length for the correct option
                ],
            ]);
    
            $requestData = $request->all();
    
            // Find the question by ID
            $question = Question::findOrFail($id);
            $question->test_id = $requestData['test_id'];
            $question->question = $requestData['questions'][1]['question']; // Assuming only one question for simplicity
            $question->marks = $requestData['questions'][1]['marks']; // Assuming only one question for simplicity
            $question->save();
    
            // Update options for the question
            $option = Option::where('question_id', $question->id)->first();
            $option->optionA = $requestData['questions'][1]['optionA']; // Assuming only one question for simplicity
            $option->optionB = $requestData['questions'][1]['optionB']; // Assuming only one question for simplicity
            $option->optionC = $requestData['questions'][1]['optionC']; // Assuming only one question for simplicity
            $option->optionD = $requestData['questions'][1]['optionD']; // Assuming only one question for simplicity
    
            // Convert correctOpt to uppercase before storing
            $correctOpt = strtoupper($requestData['questions'][1]['correctOpt']); // Assuming only one question for simplicity
            $option->correct_opt = $correctOpt;
    
            $option->save();
    
            \Log::info('Question and Options updated successfully.');
    
            // Redirect with success message
            return redirect()->route('question-list')->with('success', 'Question and options updated successfully.');
        } catch (\Exception $e) {
            // Log the exception for further investigation
            \Log::error('Error during data processing:', [
                'exception' => $e,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
    
            // Handle the exception gracefully and redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
    

    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $question = Question::find($del);
       
        $question->delete();
        $option = Option::where('question_id',$id)->first();
        $option->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }
   
}
