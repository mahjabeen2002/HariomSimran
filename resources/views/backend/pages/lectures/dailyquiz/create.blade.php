@extends('backend.layouts.layout')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>

    <div id="main">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="container ">
            <div class="page-heading">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Daily Question Form</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" action="{{ route('dailyquiz-store') }}"  method="POST"   id="test-form">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="question_name">Question:</label>
                                                            <textarea class="form-control" name="question_name" placeholder="Question Name" required>{{ old('question_name') }}</textarea>
                                                            @error('question_name')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="optionA">Option A:</label>
                                                            <input type="text" class="form-control" name="optionA" placeholder="Option A">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="optionB">Option B:</label>
                                                            <input type="text" class="form-control" name="optionB" placeholder="Option B" >
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="optionC">Option C:</label>
                                                            <input type="text" class="form-control" name="optionC" placeholder="Option C" >
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="optionD">Option D:</label>
                                                            <input type="text" class="form-control" name="optionD" placeholder="Option D" >
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="optionD">Correct Option:</label>
                                                            <input type="text" class="form-control" name="correct_option" placeholder="Correct Option" >
                                                        </div>
                                                    </div>
                                                    
                                                   
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="marks">Marks:</label>
                                                            <input type="number" class="form-control" name="marks" placeholder="Marks" required>
                                                        </div>
                                                    </div>
                                                    
                                                



                                                  <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="time_dur">Quiz Duration</label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" name="time_duration" id="time_duration"
                                                                   placeholder="Quiz Duration (minutes)" value="{{ old('time_duration') }}" min="0">
                                                            <span class="input-group-text">Minutes</span>
                                                        </div>
                                                        @error('time_duration')
                                                        <div class="text-danger text-sm">
                                                            <small>{{ $message }}</small>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                                            Add Question
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


