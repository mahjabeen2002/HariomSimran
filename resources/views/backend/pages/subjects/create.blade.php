@extends('backend.layouts.layout')
@section('content')
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
                                    <h4 class="card-title">Subject Form</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        <form class="form form-vertical" action="{{ route('subject-store') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="tittle">Select Department</label>
                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="basicSelect"
                                                                    name="department_id">
                                                                    @foreach ($department as $department)
                                                                        <option value="{{ $department->id }}">
                                                                            {{ $department->depart_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="tittle">Subject Name</label>
                                                            <input type="text" class="form-control" name="name"
                                                                placeholder="Subject Name" value="{{ old('name') }}" />
                                                            @error('name')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small></div>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary me-1 mb-1">
                                                            Add Subject
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
@endsection
