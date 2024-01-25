@extends('backend.layouts.layout')
@section('content')


<div id="main">
  @if(Session::has('success'))
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
                <h4 class="card-title">YOUR ACCOUNT </h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                
                 
                    <div class="form-body">
                        <div class="row">
                         
                          
                            {{-- <img style="width: 100px;height: 100px" src="/userimages/{{$f->profile_image}}" alt="Add Your Profile Picture" />
                            <input  type="file" name="profile_image">
                            <br> --}}
                            <span class="skill" style="width:85%;">Name:</span>
                            <input type="text" class="form-control" readonly id="name" 
                             name="name" value="{{ $f->name }}">

                            <br>
                            <span class="skill" style="width:85%;">Email:</span>
                            <input readonly type="text" class="form-control" readonly id="email" 
                            name="email" value="{{ $f->email }}">
                            <br>
                            <span class="skill" style="width:85%;">Address:</span>
                            <input type="text" class="form-control" readonly id="address"
                             name="address" value="{{ $f->address }}">
                            <br>
                            
                            <span class="skill" style="width:85%;">Contact No:</span>
                            <input type="text" class="form-control" readonly id="phone_number" name="phone_number" value="{{ $f->phone_number }}">
                            <br>
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{route('admin-setting',['id'=>$f->id])}}">
                                <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                    Update Your Account
                                </button></a>
                              
                            </div>
                               
                            </div>
                        </div>
                    </div>
                
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