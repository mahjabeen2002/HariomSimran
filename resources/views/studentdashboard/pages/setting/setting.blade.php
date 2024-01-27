@extends('studentdashboard.layouts.layout')
@section('content')

<div id="main">
  @if(Session::has('success'))
  <div class="alert alert-success">
      {{ Session::get('success') }}
  </div>
@endif
<style>
    #field0 {
  display: none;
}

</style>
<div class="container ">
  <div class="page-heading">
      <section id="basic-vertical-layouts">
        <div class="row match-height">
          <div class="col-md-12 col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Edit Account </h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                
                  <form class="form form-vertical" action="{{ route('settingpost', $user->id) }}" method="POST">
                    @csrf
                   
                    <div class="form-body">
                        <div class="row">
                         
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="depart_name">Name</label>
                                    <input type="text" class="form-control" 
                                    value="{{ $user->name }}" name="name" />
                                    @error('name')
                                    <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="depart_name">Email</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}"
                                     name="email"  />
                                    @error('email')
                                    <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="depart_name">Address</label>
                                    <input type="text" class="form-control" value="{{ $user->address }}
                                    " name="address"  value="{{ old('address') }}" />
                                    @error('address')
                                    <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="depart_name">Phone Number</label>
                                    <input type="text" class="form-control" value="{{ $user->phone_number }}" name="phone_number"   />
                                    @error('phone_number')
                                    <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="depart_name">Age</label>
                                    <input type="text" class="form-control" value="{{ $user->age }}" 
                                    name="age"  />
                                    @error('age')
                                    <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>


                            
                             
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tittle">Select Country</label>
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="country_id">
                                          <?php
                                          $countryname = DB::table('countries')->where('id',$user->country_id)->first();
                                          ?>
                                            @if ($countryname != "")
                                           <option value="{{ $countryname->id }}">
                                            {{ $countryname->name }}
                                        </option>
                                        @endif
                                          @foreach ($country as $country)
                                                <option value="{{ $country->id }}">
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                         

                             
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tittle">Select City</label>
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="city_id">
                                          <?php
                                          $cityname = DB::table('cities')->where('id',$user->city_id)->first();
                                          ?>
                                          @if ($cityname != "")
                                          <option value="{{ $cityname->id }}">
                                            {{ $cityname->name }}
                                          @endif
                                           
                                        </option>
                                          @foreach ($city as $city)
                                                <option value="{{ $city->id }}">
                                                    {{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                         

                             
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tittle">Select School</label>
                                    <fieldset class="form-group">
                                        <select class="form-select"  id="selectNo" name="school_id">
                                          <?php
                                          $schoolname = DB::table('schools')->where('id',$user->school_id)->first();
                                          ?>
                                            @if ($schoolname != "")
                                           <option value="{{ $schoolname->id }}">
                                            {{ $schoolname->name }}
                                            @endif
                                        </option>
                                          @foreach ($school as $school)
                                                <option value="{{ $school->id }}">
                                                    {{ $school->name }}
                                                </option>
                                            @endforeach
                                            <option value="0">Other</option>
                                        </select>
                                        <div class="input-box" >
                                            <input id="field0" value="" name="otherschool"  
                                            type="text" style="color: white" class="form-control" placeholder="Enter Your School Name"/>
                                            </div>
                                    </fieldset>
                                </div>
                            </div>
                         
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="depart_name">Profile Image</label>
                                    <input type="file" class="form-control" name="profile_image">
                                    <img src="/uploads/Students/{{ $user->profile_image }}"
                                     width="200px"; height="150px">
                                    <br>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                    Update 
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(function() {
$otherField = $("#field0");
$('#selectNo').on('change', function() {
if(this.value === '0') {
  $otherField.val("");
  $otherField.show();
} else {
  $otherField.hide();
  $otherField.val(this.value);
}
});
});
</script>

@endsection