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
                                <h4 class="card-title">Question Form</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-vertical" action="{{ route('question-store') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="title">Select Subject</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="subjectSelect" name="test_id">
                                                                @foreach($tests as $testItem)
                                                                    <option data-mcq="{{ $testItem->total_mcq }}"
                                                                        value="{{ $testItem->id }}">
                                                                        {{ $testItem->subject->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                
                                                <!-- Add hidden field for the total_mcq -->
                                                <input type="hidden" id="totalMcq" name="total_mcq" value="0">

                                                <!-- Dynamic question and option fields container -->
                                                <div id="questionContainer"></div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="button" id="addQuestion"
                                                        class="btn btn-success me-1 mb-1">
                                                        Add Question
                                                    </button>
                                                    <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                                        Add Questions & Options
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
                        <input type="text" class="form-control" name="questions[${questionNumber}][options][A]"
                            placeholder="Option A" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="optionB${questionNumber}">Option B</label>
                        <input type="text" class="form-control" name="questions[${questionNumber}][options][B]"
                            placeholder="Option B" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="optionC${questionNumber}">Option C</label>
                        <input type="text" class="form-control" name="questions[${questionNumber}][options][C]"
                            placeholder="Option C" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="optionD${questionNumber}">Option D</label>
                        <input type="text" class="form-control" name="questions[${questionNumber}][options][D]"
                            placeholder="Option D" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="correctOpt${questionNumber}">Correct Answer</label>
                        <input type="text" class="form-control" name="questions[${questionNumber}][correctOpt]"
                            placeholder="Correct Answer" required />
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
