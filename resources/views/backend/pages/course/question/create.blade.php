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
                                <h4 class="card-title"> Course Quiz Question Form</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-vertical" action="{{ route('coursetestquestion-store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label class="mb-3">Select Lecture</label>
                                                    <select class="form-select" name="lecture_id" id="floatingSelect" aria-label="Floating label select example" required>
                                                        <option value="">---Select Course Lecture Here--</option>
                                                        @foreach($lectures as $lecture)
                                                            <option value="{{ $lecture->id }}">{{ $lecture->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('lecture_id')
                                                        <div class="text-danger text-sm">
                                                            <small>{{ $message }}</small>
                                                        </div>
                                                    @enderror
                                                </div>
                                                
                                                <!-- Your existing form fields -->

                                                <!-- Add dynamic fields for questions and options -->
                                                <div class="questions-container">
                                                    <div class="question-row">
                                                        <label>Question</label>
                                                        <input type="text" class="form-control" name="questions[0][question]" required>

                                                        <div class="options-container mt-3">
                                                            @for ($i = 0; $i < 4; $i++)
                                                                <div class="option-row mb-2">
                                                                    <label class="me-2">Option {{ chr(65 + $i) }}</label>
                                                                    <input type="text" class="form-control" name="questions[0][options][{{ $i }}][option]" required>
                                                                </div>
                                                            @endfor
                                                            <div class="option-row mb-2">
                                                                <label class="me-2">Correct Option</label>
                                                                <input type="text" class="form-control" name="questions[0][correct_opt]" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="button" class="btn btn-primary mt-3" id="add-question-btn">Add Question</button>

                                                <div class="col-12 d-flex justify-content-end">
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

<!-- ... existing code ... -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const questionsContainer = document.querySelector('.questions-container');
        const addQuestionBtn = document.getElementById('add-question-btn');
        let questionIndex = 1;

        addQuestionBtn.addEventListener('click', function () {
            const newQuestionRow = document.createElement('div');
            newQuestionRow.className = 'question-row';
            newQuestionRow.innerHTML = `
                <label>Question</label>
                <input type="text" class="form-control" name="questions[${questionIndex}][question]" required>

                <div class="options-container mt-3">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="option-row mb-2">
                            <label class="me-2">Option {{ chr(65 + $i) }}</label>
                            <input type="text" class="form-control" name="questions[${questionIndex}][options][${i}][option]" required>
                        </div>
                    @endfor
                    <div class="option-row mb-2">
                        <label class="me-2">Correct Option</label>
                        <input type="text" class="form-control" name="questions[${questionIndex}][correct_opt]" required>
                    </div>
                </div>
            `;
            questionsContainer.appendChild(newQuestionRow);
            questionIndex++;
        });
    });
</script>

<!-- ... existing code ... -->

@endsection

