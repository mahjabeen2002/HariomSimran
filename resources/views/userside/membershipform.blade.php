@extends("userside.layout")
@section("title")
<head>
<title>Membership Form | HariomSimran</title>
<meta name="description" content="Registration Page" />
<meta name="keywords" content="HariomSimran" />
</head>
@endsection
@section("usercontent")
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(Mytemplate/assets/img/subheader.jpg)">

  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Membership Form</h1>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Membership Form</li>
        </ol>
      </nav>
    </div>
  </div>

</div>
<br><br>
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-md-push-3">
            <h4 class="text-gray mt-0 pt-5">Register</h4>
            <hr>

            @if (session('submit'))
            <div class="alert alert-success" role="alert">
                <strong>{{session('submit')}}</strong>
            </div>
            @endif

            <form method="POST" action="{{URL::to('/membershipformpost')}}" class="clearfix">
                @csrf
              <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">First Name</label>
                  <input type="text" class="form-control" name="firstname" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Last Name</label>
                    <input type="text" class="form-control" name="lastname" required>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Country</label>
                  <input type="text" class="form-control" name="country" required>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">City</label>
                  <input type="text" class="form-control" name="city" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Address</label>
                  <input type="text" class="form-control" name="address" required>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                      <label for="">Gender</label>
                      <select class=" form-control" aria-label="Default select example" name="gender">
                        <option selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="age">Age</label>
                  <input type="number" class="form-control" name="age" required>
                </div>
               </div>

               <div class="row">
                <div class="form-group col-md-12">
                    <label for="name">Religion</label>
                  <input type="text" class="form-control" name="religion" required>
                </div>
              </div>

              <div class="clear text-center pt-10">
                <button type="submit" class="sigma_btn-custom section-button form-control">Submit</button>
              </div>
              <br>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
