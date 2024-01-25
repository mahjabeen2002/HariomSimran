@extends('backend.layouts.layout')
@section('content')

    <div id="main">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong> <br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container ">
            <div class="page-heading">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Course Detail Form</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card">

                                        <form id="your-form-id" action="{{ route('coursedetail-store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                        data-bs-target="#home" type="button" role="tab"
                                                        aria-controls="home" aria-selected="true">
                                                        Home
                                                    </button>
                                                </li>

                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                                        data-bs-target="#details" type="button" role="tab"
                                                        aria-controls="details" aria-selected="false">
                                                        DETAILS
                                                    </button>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade border p-3 show active" id="home"
                                                    role="tabpanel" aria-labelledby="home-tab">

                                                    <div class=" mb-3">
                                                        <div class=" mb-3">
                                                            <label class=" mb-3">Select Category</label>
                                                            <select class="form-select" name="category_id" id="floatingSelect"
                                                                aria-label="Floating label select example" required>
                                                                <option value="">---Select Category Here--</option>
                                                                @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                            </select>
                                                            @error('category_id')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class=" mb-3">
                                                        <div class=" mb-3">
                                                            <label class=" mb-3">Select SubCategory</label>
                                                            <select class="form-select" name="subcategory_id" id="floatingSelect"
                                                                aria-label="Floating label select example" required>
                                                                <option value="">---Select SubCategory Here--</option>
                                                                @foreach($subcategory as $sub)
                                                                <option value="{{ $sub->id }}">{{ $sub->title }}</option>
                                                            @endforeach
                                                            </select>
                                                            @error('subcategory_id')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class=" mb-3">
                                                        <div class=" mb-3">
                                                            <label class=" mb-3">Select Instructor</label>
                                                            <select class="form-select" name="instructor_id" id="floatingSelect"
                                                                aria-label="Floating label select example" required>
                                                                <option value="">---Select instructor Here--</option>
                                                                @foreach($instructor as $instructor)
                                                                <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                                                            @endforeach
                                                            </select>
                                                            @error('instructor_id')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Description</label>
                                                            <div id="editor">{{ old('course_description') }}</div>
                                                            @error('course_description')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small></div>
                                                            @enderror
                                                        </div>
                                                        <input type="hidden" name="course_description"
                                                            id="hidden-editor-input">
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">What You Learn</label>
                                                            <div id="learn_editor">{{ old('what_you_will_learn') }}</div>
                                                            @error('what_you_will_learn')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small></div>
                                                            @enderror
                                                        </div>
                                                        <input type="hidden" name="what_you_will_learn"
                                                            id="hidden-learn-editor-input">
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Certification</label>
                                                            <div id="certification_editor">{{ old('certification_description') }}</div>
                                                            @error('certification_description')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small></div>
                                                            @enderror
                                                        </div>
                                                        <input type="hidden" name="certification_description"
                                                            id="hidden-certification-editor-input">
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade border p-3" id="details" role="tabpanel"
                                                    aria-labelledby="details-tab">
                                                    
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="tittle">Language</label>
                                                            <input type="text" class="form-control" name="language"
                                                                placeholder="Language" value="{{ old('language') }}" />
                                                            @error('language')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small></div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Upload Images</label>
                                                        <input type="file" multiple name="image" required>
                                                        @error('image')
                                                            <div class="text-danger text-sm">
                                                                <small>{{ $message }}</small>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                                    Add Course Detail
                                                </button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                    Reset
                                                </button>
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

    <!-- Include CKEditor script -->

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>


    <!-- Initialize CKEditor -->
 <script>
    if (typeof CKEDITOR !== 'undefined') {
    CKEDITOR.replace('editor', {
        // Your CKEditor configuration options, if any
    });

    CKEDITOR.replace('learn_editor', {
        // Your CKEditor configuration options for 'learn_description', if any
    });

    CKEDITOR.replace('certification_editor', {
        // Your CKEditor configuration options for 'certification', if any
    });

    // Update form submission to include CKEditor content
    document.getElementById('your-form-id').addEventListener('submit', function () {
        var editorContent = CKEDITOR.instances.editor.getData();
        document.getElementById('hidden-editor-input').value = editorContent;

        var learnDescriptionContent = CKEDITOR.instances.learn_editor.getData();
        document.getElementById('hidden-learn-editor-input').value = learnDescriptionContent;

        var certificationContent = CKEDITOR.instances.certification_editor.getData();
        document.getElementById('hidden-certification-editor-input').value = certificationContent;
    });
} else {
    console.error('CKEditor not found. Check if the script is loaded.');
}

 </script>
@endsection
