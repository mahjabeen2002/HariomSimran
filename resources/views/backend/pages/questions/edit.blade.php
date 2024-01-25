@extends('backend.layouts.layout')
@section('content')

<div id="main">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
        <div class="page-heading">
            <section id="basic-vertical-layouts">
                <div class="row match-height">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Question</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-vertical" action="{{ route('question-update', $question->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="title">Select Subject</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="subjectSelect" name="test_id">
                                                                @foreach($tests as $testItem)
                                                                    <option data-mcq="{{ $testItem->total_mcq }}"
                                                                        value="{{ $testItem->id }}"
                                                                        {{ $question->test_id == $testItem->id ? 'selected' : '' }}>
                                                                        {{ $testItem->subject->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <!-- Add hidden field for the total_mcq -->
                                                <input type="hidden" id="totalMcq" name="total_mcq" value="{{ count($question->options) }}">

                                                <!-- Dynamic question and option fields container -->
                                                <div id="questionContainer">
                                                    @foreach($question->options as $key => $option)
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="question{{ $key + 1 }}">Question {{ $key + 1 }}</label>
                                                                <input type="text" class="form-control" name="questions[{{ $key + 1 }}][question]"
                                                                    placeholder="Question {{ $key + 1 }}" value="{{ $question->question }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="optionA{{ $key + 1 }}">Option A</label>
                                                                <input type="text" class="form-control" name="questions[{{ $key + 1 }}][optionA]"
                                                                    placeholder="Option A" value="{{ $option->optionA }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="optionB{{ $key + 1 }}">Option B</label>
                                                                <input type="text" class="form-control" name="questions[{{ $key + 1 }}][optionB]"
                                                                    placeholder="Option B" value="{{ $option->optionB }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="optionC{{ $key + 1 }}">Option C</label>
                                                                <input type="text" class="form-control" name="questions[{{ $key + 1 }}][optionC]"
                                                                    placeholder="Option C" value="{{ $option->optionC }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="optionD{{ $key + 1 }}">Option D</label>
                                                                <input type="text" class="form-control" name="questions[{{ $key + 1 }}][optionD]"
                                                                    placeholder="Option D" value="{{ $option->optionD }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="correctOpt{{ $key + 1 }}">Correct Answer</label>
                                                                <input type="text" class="form-control" name="questions[{{ $key + 1 }}][correctOpt]"
                                                                    placeholder="Correct Answer" value="{{ $option->correct_opt }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="marks{{ $key + 1 }}">Marks</label>
                                                                <input type="text" class="form-control" name="questions[{{ $key + 1 }}][marks]"
                                                                    placeholder="Marks" value="{{ $question->marks }}" />
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="button" id="addQuestion"
                                                        class="btn btn-success me-1 mb-1">
                                                        Add Question
                                                    </button>
                                                    <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                                        Update Questions & Options
                                                    </button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Add question and option fields dynamically
        $("#addQuestion").on("click", function () {
            var selectedSubject = $("#subjectSelect option:selected");
            var totalMcq = parseInt(selectedSubject.data("mcq"));
            var currentMcq = parseInt($("#totalMcq").val());

            // Check if the user has reached the total_mcq limit
            if (currentMcq >= totalMcq) {
                alert("You have reached the maximum number of questions for this subject.");
                return;
            }

            // Update totalMcq value
            $("#totalMcq").val(currentMcq + 1);

            // Add question and option fields to the container
            var questionNumber = currentMcq + 1;
            var questionHtml = `
                <div class="col-12">
                    <div class="form-group">
                        <label for="question${questionNumber}">Question ${questionNumber}</label>
                        <input type="text" class="form-control" name="questions[${questionNumber}][question]"
                            placeholder="Question ${questionNumber}" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="optionA${questionNumber}">Option A</label>
                        <input type="text" class="form-control" name="questions[${questionNumber}][optionA]"
                            placeholder="Option A" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="optionB${questionNumber}">Option B</label>
                        <input type="text" class="form-control" name="questions[${questionNumber}][optionB]"
                            placeholder="Option B" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="optionC${questionNumber}">Option C</label>
                        <input type="text" class="form-control" name="questions[${questionNumber}][optionC]"
                            placeholder="Option C" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="optionD${questionNumber}">Option D</label>
                        <input type="text" class="form-control" name="questions[${questionNumber}][optionD]"
                            placeholder="Option D" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="correctOpt${questionNumber}">Correct Answer</label>
                        <input type="text" class="form-control" name="questions[${questionNumber}][correctOpt]"
                            placeholder="Correct Answer" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="marks${questionNumber}">Marks</label>
                        <input type="text" class="form-control" name="questions[${questionNumber}][marks]"
                            placeholder="Marks" />
                    </div>
                </div>
            `;

            $("#questionContainer").append(questionHtml);
        });
    });
</script>

@endsection
