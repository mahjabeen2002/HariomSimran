@extends('backend.layouts.layout')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>
<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>

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
                                    <h4 class="card-title">Tests Form</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        <form class="form form-vertical" action="{{ route('test-store') }}" method="POST"
                                            enctype="multipart/form-data"     id="test-form">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="department_id">Select Department</label>
                                                            <select class="form-select" id="department_id" name="department_id">
                                                                @foreach ($department as $dept)
                                                                    <option value="{{ $dept->id }}">{{ $dept->depart_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="subject_id">Select Subject</label>
                                                            <select class="form-select" id="subject_id" name="subject_id">
                                                                <!-- Options will be dynamically loaded here -->
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="tittle">Title</label>
                                                            <input type="text" class="form-control" name="title"
                                                                placeholder="Tittle" value="{{ old('title') }}" />
                                                            @error('title')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small></div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Description</label>
                                                            <textarea name="description" class="form-control" id="" cols="3" rows="3" required>{{ old('description') }}</textarea>
                                                            @error('description')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small></div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="time_dur">Test Duration</label>
                                                            <div class="input-group">
                                                                <input type="text" id="time"  class="form-control" name="time_dur" id="time_dur"
                                                                       placeholder="Test Duration (minutes)" value="{{ old('time_dur') }}" min="0">
                                                                <span class="input-group-text">Minutes</span>
                                                            </div>
                                                            @error('time_dur')
                                                            <div class="text-danger text-sm">
                                                                <small>{{ $message }}</small>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="tittle">Total Marks</label>
                                                            <input type="text" class="form-control" name="total_marks"
                                                                placeholder="Total Marks"
                                                                value="{{ old('total_marks') }}" />
                                                            @error('total_marks')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small></div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="tittle">Total Mcqs</label>
                                                            <input type="text" class="form-control" name="total_mcq"
                                                                placeholder="Total Mcqs" value="{{ old('total_mcq') }}" />
                                                            @error('total_mcq')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small></div>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="tittle">Passing Mark</label>
                                                            <input type="text" class="form-control" name="pass_marks"
                                                                placeholder="Passing Mark"
                                                                value="{{ old('pass_marks') }}" />
                                                            @error('pass_marks')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small></div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="tittle">Difficulty Level</label>
                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="basicSelect" name="level">
                                                                    <option value="beginner">Beginner</option>
                                                                    <option value="intermediate">Intermediate</option>
                                                                    <option value="expert">Expert</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary me-1 mb-1">
                                                            Add Test
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
    
    {{-- <script>
        flatpickr("#time_dur", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });

        $(document).ready(function () {
            // Add an ID to your form for easy targeting
            $('#test-form').submit(function () {
                var minutes = $('#time_dur').val();
                // Store the total time in a hidden input field
                $('<input>').attr({
                    type: 'hidden',
                    id: 'total-time',
                    name: 'total_time',
                    value: minutes
                }).appendTo('#test-form');
            });
        });
    </script> --}}
    
    <script>
        var timepicker = new TimePicker('time', {
          lang: 'en',
          theme: 'dark'
        });
        timepicker.on('change', function(evt) {
          
          var value = (evt.hour || '00') + ':' + (evt.minute || '00');
          evt.element.value = value;
        
        });
        </script>


    <script>
        $(document).ready(function () {
            $('#department_id').change(function () {
                var departmentId = $(this).val();
    
                // Make an AJAX request to get subjects based on the selected department
                $.ajax({
                    type: 'GET',
                    url: '/get-subjects/' + departmentId, // Create a route for this URL in your web.php
                    success: function (data) {
                        // Clear existing options
                        $('#subject_id').empty();
    
                        // Add a default option
                        $('#subject_id').append('<option value="">Select Subject</option>');
    
                        // Add new options based on the response
                        $.each(data, function (key, value) {
                            $('#subject_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
    
@endsection
