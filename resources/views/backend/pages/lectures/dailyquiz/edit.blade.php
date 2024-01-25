@extends('backend.layouts.layout')

@section('content')
    <div id="main">
        <div class="container">
            <div class="page-heading">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Daily Question</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Your update form for daily quiz -->
                                        <form class="form form-vertical" action="{{ route('dailyquiz-update', ['id' => $question->id]) }}" method="POST" id="edit-test-form">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="question_name">Question:</label>
                                                <textarea class="form-control" name="question_name" placeholder="Question Name" required>{{ $question->question_name }}</textarea>
                                                @error('question_name')
                                                    <div class="text-danger text-sm">
                                                        <small>{{ $message }}</small>
                                                    </div>
                                                @enderror
                                            </div>

                                            <!-- Options Section -->
                                            @foreach ($question->dailyOptions as $option)
                                                <div class="form-group">
                                                    <label for="optionA">Option A:</label>
                                                    <input type="text" class="form-control" name="options[{{ $option->id }}][optionA]" placeholder="Option A" value="{{ $option->optionA ?? '' }}">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="optionB">Option B:</label>
                                                    <input type="text" class="form-control" name="options[{{ $option->id }}][optionB]" placeholder="Option B" value="{{ $option->optionB ?? '' }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="optionC">Option C:</label>
                                                    <input type="text" class="form-control" name="options[{{ $option->id }}][optionC]" placeholder="Option C" value="{{ $option->optionC ?? '' }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="optionD">Option D:</label>
                                                    <input type="text" class="form-control" name="options[{{ $option->id }}][optionD]" placeholder="Option D" value="{{ $option->optionD ?? '' }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="correct_option">Correct Option:</label>
                                                    <input type="text" class="form-control" name="options[{{ $option->id }}][correct_option]" placeholder="Correct Option" value="{{ $option->correct_option }}">
                                                </div>

                                                {{-- <div class="form-group">
                                                    <label for="correct_option">Correct Option:</label>
                                                    <select class="form-control" name="options[{{ $option->id }}][correct_option]" required>
                                                        <option value="optionA" {{ $option->correct_opt == 'optionA' ? 'selected' : '' }}>Option A</option>
                                                        <option value="optionB" {{ $option->correct_opt == 'optionB' ? 'selected' : '' }}>Option B</option>
                                                        <option value="optionC" {{ $option->correct_opt == 'optionC' ? 'selected' : '' }}>Option C</option>
                                                        <option value="optionD" {{ $option->correct_opt == 'optionD' ? 'selected' : '' }}>Option D</option>
                                                    </select>
                                                </div> --}}
                                            @endforeach
                                            <!-- End Options Section -->

                                            <div class="form-group">
                                                <label for="marks">Marks:</label>
                                                <input type="number" class="form-control" name="marks" placeholder="Marks" value="{{ $question->marks }}" required>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="time_duration">Quiz Duration</label>
                                                    <input type="text" class="form-control" value="{{ $question->time_duration }}"
                                                           name="time_duration" placeholder="Test Duration"/>
                                                    @error('time_duration')
                                                    <div class="text-danger text-sm"><small>{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">Update Question</button>
                                                <a href="{{ route('dailyquiz-list') }}" class="btn btn-light-secondary me-1 mb-1">Cancel</a>
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

   

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <script>
        flatpickr("#time_duration", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });

        $(document).ready(function () {
            // Add an ID to your form for easy targeting
            $('#test-form').submit(function () {
                var minutes = $('#time_duration').val();
                // Store the total time in a hidden input field
                $('<input>').attr({
                    type: 'hidden',
                    id: 'total-time',
                    name: 'total_time',
                    value: minutes
                }).appendTo('#test-form');
            });
        });
    </script>

@endsection
