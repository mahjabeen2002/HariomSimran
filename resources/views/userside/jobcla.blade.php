@extends("userside.layout")
@section("title")
<head>
<title>Job Classified | HariomSimran</title>
<meta name="description" content="Job Classified Page" />
<meta name="keywords" content="HariomSimran" />
</head>
@endsection
@section("usercontent")
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(Mytemplate/assets/img/subheader.jpg)">

  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Job Classified </h1>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Job Classified</li>
        </ol>
      </nav>
    </div>
  </div>

</div>
<br><br>
<div class="section section-padding">
  <div class="container">
    <div class="row">

      @foreach($fetchjob as $fj)

      <div class="col-lg-4 col-md-6">
        <a href="/jobdetail/{{$fj->Title}}/{{$fj->id}}" class="sigma_service style-2">
          <div class="sigma_service-thumb">
          <img  src="/jobimages/{{$fj->image}}" style="height: 200px;width: 100%" alt="img">
            <i class="flaticon-powder"></i>
          </div>
          <div class="sigma_service-body">
            <h5>{{$fj->Title}}</h5>
            <p><?php
              $f1 = strip_tags($fj->short_Des);
              $f2 = Str::limit($f1,50);
            
             ?> {{$f2}} </p>
          </div>
        </a>
      </div>
@endforeach
    </div>
    <ul class="pagination mb-0">
      {{$fetchjob->links()}}
    </ul>
  </div>
</div>


@endsection