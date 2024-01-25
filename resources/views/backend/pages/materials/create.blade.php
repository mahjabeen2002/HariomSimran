@extends('backend.layouts.layout')
@section('content')

<div id="main">
  @if(Session::has('success'))
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
                <h4 class="card-title">Course Material Form</h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                
                  <form id="your-form-id" class="form form-vertical" action="{{ route('material-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class=" mb-3">
                                <div class=" mb-3">
                                    <label class=" mb-3">Select SubCategory  </label>
                                    <select class="form-select" name="course_subcategory_id" id="floatingSelect"
                                        aria-label="Floating label select example" required>
                                        <option value="">---Select Category Here--</option>
                                        @foreach($subcategory as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
                                    @endforeach
                                    </select>
                                    @error('course_subcategory_id')
                                        <div class="text-danger text-sm">
                                            <small>{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tittle">Tittle</label>
                                    <input type="text" class="form-control" name="title" placeholder="Tittle" value="{{ old('title') }}" />
                                    @error('title')
                                    <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="file">File</label>
                                    <input type="file" class="form-control" name="file" accept=".pdf, .doc, .docx, .txt, .jpg, .jpeg, .png" />
                                    @error('file')
                                        <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                  <label class="form-label">Description</label>
                                  <div id="editor">{{ old('description') }}</div>
                                  @error('description')
                                      <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                  @enderror
                              </div>
                              <input type="hidden" name="description" id="hidden-editor-input">
                          </div>
                       
                          
                         
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                    Add Materail
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

<!-- Include CKEditor script -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<!-- Initialize CKEditor -->
<script>
    CKEDITOR.replace('editor', {
        // Your CKEditor configuration options, if any
    });

    // Update form submission to include 'editor' CKEditor content
    document.getElementById('your-form-id').addEventListener('submit', function() {
        var editorContent = CKEDITOR.instances.editor.getData();
        document.getElementById('hidden-editor-input').value = editorContent;
    });

   
</script>
@endsection