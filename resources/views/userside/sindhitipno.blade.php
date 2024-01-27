@extends("userside.layout")
@section("title")
<head>
<title>Sindhi Tipno | HariomSimran</title>
<meta name="description" content="Sindhi Tipno  Page" />
<meta name="keywords" content="HariomSimran" />
</head>
@endsection
@section("usercontent")
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(../../Mytemplate/assets/img/subheader.jpg)">

  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Sindhi Tipno</h1>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Sindhi Tipno</li>
        </ol>
      </nav>
    </div>
  </div>

</div>


  <div class="section section-padding">
    <div class="container">
      <div class="row">

        @foreach($fetchjob as $fj)

        <div class="col-lg-4 col-md-6">
          <a href="sindhidetail/{{$fj->title}}/{{$fj->id}}" class="sigma_service style-2">
            <div class="sigma_service-thumb">
            <img  src="/sindhiimages/{{$fj->image}}" style="height: 200px;width: 100%" alt="img">
              <i class="flaticon-powder"></i>
            </div>
            <div class="sigma_service-body">
              <h5>{{$fj->title}}</h5>
              <p><?php
                $f1 = strip_tags($fj->long_Des);
                $f2 = Str::limit($f1,50);
              
               ?> {{$f2}} </p>
            </div>
          </a>
        </div>
@endforeach
      </div>
    </div>
  </div>
  
<br>
@endsection