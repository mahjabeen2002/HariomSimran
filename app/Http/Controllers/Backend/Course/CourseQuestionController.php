<?php

namespace App\Http\Controllers\Backend\Course;
use Illuminate\Support\Facades\Log;
use App\Models\Lecture;
use App\Models\Coursequiz;
use Illuminate\Http\Request;
use App\Models\CoursequizOption;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class CourseQuestionController extends Controller
{
    
    
    


    public function list(Lecture $lecture)
    {
        $questions = Coursequiz::all();
        return view('backend.pages.course.question.index', compact('lecture', 'questions'));
    }

    public function create()
    {
        $lectures = Lecture::all();
        return view('backend.pages.course.question.create', compact('lectures'));
    }
    


  
  
    
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'lecture_id' => 'required|exists:lectures,id',
    //         'questions.*.question' => 'required',
    //         'questions.*.options.*.option' => 'required',
    //         'questions.*.correct_opt' => 'required',
    //     ]);
    
    //     $lecture = Lecture::findOrFail($request->lecture_id);
    
    //     foreach ($request->questions as $questionData) {
    //         $question = $lecture->quizzes()->create([
    //             'question' => $questionData['question'],
    //             'marks' => 1, // Assuming each question has a fixed mark of 1
    //         ]);
    
    //         foreach ($questionData['options'] as $optionData) {
    //             $question->options()->create([
    //                 'option' => $optionData['option'],
    //                 'correct_opt' => $questionData['correct_opt'],
    //             ]);
    //         }
    //     }
    
    //     return redirect()->route('coursetestquestion.list')->with('success', 'Questions and Options added successfully');
    // }
    
    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'lecture_id' => 'required|exists:lectures,id',
                'questions.*.question' => 'required|string|max:255',
                'questions.*.marks' => 'required|integer|min:1',
                'questions.*.options.A' => 'required|string|max:255',
                'questions.*.options.B' => 'required|string|max:255',
                'questions.*.options.C' => 'required|string|max:255',
                'questions.*.options.D' => 'required|string|max:255',
                'questions.*.correct_opt' => [
                    'required',
                    'string',
                    'max:1',
                    Rule::in(['A', 'B', 'C', 'D']),
                ],
            ]);
    
            $requestData = $request->all();
    
            // Loop through each question and its options
            foreach ($requestData['questions'] as $questionData) {
                try {
                    // Create a new question
                    $question = new Coursequiz();
                    $question->lecture_id = $requestData['lecture_id'];
                    $question->question = $questionData['question'];
                    $question->marks = $questionData['marks'];
                    $question->save();
    
                    // Create options for the question
                    $option = new CoursequizOption();
                    $option->quiz_id = $question->id;
                    $option->optionA = $questionData['options']['A'];
                    $option->optionB = $questionData['options']['B'];
                    $option->optionC = $questionData['options']['C'];
                    $option->optionD = $questionData['options']['D'];
                    $option->correct_opt = $questionData['correct_opt'];
                    $option->save();
    
                    Log::info("Processed question:", [
                        'question' => $questionData['question'],
                        'marks' => $questionData['marks'],
                        'optionA' => $questionData['options']['A'],
                        'optionB' => $questionData['options']['B'],
                        'optionC' => $questionData['options']['C'],
                        'optionD' => $questionData['options']['D'],
                        'correct_opt' => $questionData['correct_opt'],
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
    
    
   
    
   
    
    



    // public function edit($id)
    // {
        
    //     $question = Question::findOrFail($id);
    //     $tests = Test::all();
    //     return view('backend.pages.questions.edit', compact('tests', 'question'));
    // }

 

    // public function update(Request $request, $id)
    // {
    //     try {
    //         // Validate the request data
    //         $request->validate([
    //             'test_id' => 'required|exists:tests,id',
    //             'questions.*.question' => 'required|string|max:255',
    //             'questions.*.marks' => 'required|integer|min:1',
    //             'questions.*.optionA' => 'required|string|max:255',
    //             'questions.*.optionB' => 'required|string|max:255',
    //             'questions.*.optionC' => 'required|string|max:255',
    //             'questions.*.optionD' => 'required|string|max:255',
    //             'questions.*.correctOpt' => [
    //                 'required',
    //                 'string',
    //                 'max:1',
    //                 Rule::in(['A', 'B', 'C', 'D']),
    //             ],
    //         ]);
    
    //         $requestData = $request->all();
    
    //         // Find the question by ID
    //         $question = Question::findOrFail($id);
    //         $question->test_id = $requestData['test_id'];
    //         $question->question = $requestData['questions'][1]['question']; // Assuming only one question for simplicity
    //         $question->marks = $requestData['questions'][1]['marks']; // Assuming only one question for simplicity
    //         $question->save();
    
    //         // Update options for the question
    //         $option = Option::where('question_id', $question->id)->first();
    //         $option->optionA = $requestData['questions'][1]['optionA']; // Assuming only one question for simplicity
    //         $option->optionB = $requestData['questions'][1]['optionB']; // Assuming only one question for simplicity
    //         $option->optionC = $requestData['questions'][1]['optionC']; // Assuming only one question for simplicity
    //         $option->optionD = $requestData['questions'][1]['optionD']; // Assuming only one question for simplicity
    //         $option->correct_opt = $requestData['questions'][1]['correctOpt']; // Assuming only one question for simplicity
    //         $option->save();
    
    //         \Log::info('Question and Options updated successfully.');
    
    //         // Redirect with success message
    //         return redirect()->route('question-list')->with('success', 'Question and options updated successfully.');
    //     } catch (\Exception $e) {
    //         // Log the exception for further investigation
    //         \Log::error('Error during data processing:', [
    //             'exception' => $e,
    //             'message' => $e->getMessage(),
    //             'trace' => $e->getTraceAsString(),
    //         ]);
    
    //         // Handle the exception gracefully and redirect back with an error message
    //         return redirect()->back()->with('error', 'An error occurred while processing your request.');
    //     }
    // }

    // public function delete(Request $request,$id)
    // {
    //     $del= $request->id;
    //     $question = Question::find($del);
       
    //     $question->delete();
    //     $option = Option::where('question_id',$id)->first();
    //     $option->delete();
    //     return redirect()->back()->with('warning', 'Deleted  Successfully');
    // }
}
