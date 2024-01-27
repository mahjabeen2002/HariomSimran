@extends("userside.layout")
@section("title")
<head>
<title>Registration | HariomSimran</title>
<meta name="description" content="Registration Page" />
<meta name="keywords" content="HariomSimran" />
</head>
@endsection
@section("usercontent")
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(Mytemplate/assets/img/subheader.jpg)">

  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Register</h1>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
      </nav>
    </div>
  </div>

</div>
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-push-3" style="margin-top:40px ">
              <img src="Mytemplate/assets/img/about.jpg" alt="about">
            
          </div>

          
          <div class="col-md-6 col-md-push-3">
            <h4 class="text-gray mt-0 pt-5"> Register</h4>
            <hr>
            <form method="POST" action="{{route('register.process')}}" class="clearfix" enctype="multipart/form-data">
                @csrf
              <div class="row">
                <div class="form-group col-md-12">
                    <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" required autofocus>
                  @error('name')
                  <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                    <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" required>
                  @error('email')
                  <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                    <label for="age">Age</label>
                  <input type="number" class="form-control" name="age" required>
                  @error('age')
                  <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                    <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" required >
                  @error('password')
                  <div class="text-danger text-sm"><small>{{ $message }}</small></div>
              @enderror
                 </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                    <label for="age">Profile Image</label>
                    <input type="file" placeholder="Profile Image" name="image" style="  padding: 15px;       
                    ">
               @error('image')
               <div class="text-danger text-sm"><small>{{ $message }}</small></div>
               @enderror
                </div>
              </div>
             
              {{-- <div class="form-group pull-right">
                <a href="/loginget" type="submit" class="sigma_btn-custom section-button">Sign in?</a>
              </div> --}}
             
            
              <div class="clear text-center pt-10">
                <button type="submit" class="sigma_btn-custom section-button form-control">Register</button>
              </div>
              <br>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
