@extends("userside.layout")
@section("title")
<head>
<title>Test Your Skills | HariomSimran</title>
<meta name="description" content="Team Page" />
<meta name="keywords" content="HariomSimran" />
</head>
@endsection
@section("usercontent")
<!-- ============================ Page Title Start================================== -->

<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="/Mytemplate/images/bg/bg6.jpg">
    <div class="container pt-70 pb-20">
      <!-- Section Content -->
      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-white text-center">Test Your Skills</h2>
            <ol class="breadcrumb text-left text-black mt-10">
              <li><a href="#">Home</a></li>
              <li><a href="#">Pages</a></li>
              <li class="active text-gray-silver">Test Your Skills</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<!-- ============================ Page Title End ================================== -->			


<!-- ============================ Full Width Shop  ================================== -->
<section class="pt-0">
    <div class="container">
    <hr>
    <div class="row">
        
        <div class="col-md-5"></div>
        <div class="col-md-4"><h4>Select any one skill</h4></div>
        <div class="col-md-3"></div>
    </div>
    <hr>
    <br><br>
  
      
        <div class="row">
        @foreach($category as $cat)
      
        <div class="col-md-3">
            @if(session('id1'))
            <a href="/skilltest/{{$cat->category_name}}/{{$cat->id}}" class="form-control btn btn-danger" style=""  >{{$cat->category_name}}</a>
           
           @else
            <a href="#" class="form-control btn btn-danger" style="" onclick="alert('please login first')">{{$cat->category_name}}</a>
            @endif
           
        </div>
        @endforeach
        </div>
       
    <br><br><br>
</section>
@endsection