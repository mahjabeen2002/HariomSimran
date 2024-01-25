<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OptionController extends Controller
{
    // public function update(Request $request, Question $question, Option $option)
    // {
    //     $request->validate([
    //         'option_text' => 'required|string',
    //         'is_correct' => 'required|boolean',
    //     ]);

    //     $option->update($request->all());

    //     return redirect()->route('backend.pages.questions.index', $question->test_id)
    //         ->with('success', 'Option updated successfully');
    // }

    // public function destroy(Question $question, Option $option)
    // {
    //     $option->delete();

    //     return redirect()->route('backend.pages.questions.index', $question->test_id)
    //         ->with('success', 'Option deleted successfully');
    // }

    public function optioncreate(Question $question)
    {
        return view('backend.pages.options.create', compact('question'));
    }

    public function optionstore(Request $request, Question $question)
    {
        $request->validate([
            'option_text' => 'required|string',
            'is_correct' => 'required|boolean',
        ]);

        $question->options()->create($request->all());

        return redirect()->route('questionlist', $question->test_id)
            ->with('success', 'Option created successfully');
    }

    public function optionedit(Question $question, Option $option)
    {
        return view('backend.pages.options.edit', compact('question', 'option'));
    }

    public function optionupdate(Request $request, Question $question, Option $option)
    {
        $request->validate([
            'option_text' => 'required|string',
            'is_correct' => 'required|boolean',
        ]);

        $option->update($request->all());

        return redirect()->route('questions.index', $question->test_id)
            ->with('success', 'Option updated successfully');
    }

    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $option = Option::find($del);
       
        $option->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }

    

}