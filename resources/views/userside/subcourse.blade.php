@extends("userside.layout")
@section("title")
<head>
  <title> {{$fetchimg->Title}}</title>
<meta name="description" content="Course Detail Page" />
<meta name="keywords" content="HariomSimran" />
</head>
@endsection
@section("usercontent")




 

  <!-- Start main-content -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(../../Mytemplate/assets/img/subheader.jpg)">

    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>Courses</h1>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Courses</li>
          </ol>
        </nav>
      </div>
    </div>
  
  </div>
  <br><br>
    <!-- Section: Blog -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              <div class="thumb">
                <img src="/courseimages/{{$fetchimg->c_image}}" alt="" width="600px" height="100%">
              </div>
            </div>
         
          
        
          <div class="col-md-6">
            <div class="single-service">
            {{-- <img src="/courseimages/{{$fetchimg->c_image}}" width="100%" height="400px"> --}}
            <h3 class="name font-24 mt-0 mb-0" style="font-size: 40px">{{$fetchimg->Title}}</h3>
            
             <br>
             <h6 class="text-theme-colored">Topics Included in this course</h6>
             @foreach($fetchsubcourse as $fs)
              
              <p>{{$fs->Title}}</p>
              @endforeach
              <div class="row">
                <div class="col-md-12">
                  <h5 class="text-theme-colored">Features of the course </h5>

                  <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <div class="icon-box box-border text-center ">
                       <i class="fa fa-desktop text-theme-color-2 font-36"></i>
                       <h5 class="" style="font-size: 20px">{{$fetchimg->course_duration}}</h5>
                      </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <div class="icon-box box-border text-center">
                        <i class="fa fa-user text-theme-color-2 font-36"></i>
                        <h5 class="" style="font-size: 20px">Best Teachers</h5>
                    
                        <?php
                        $uid = session('id1');
                          $cname = DB::table('courseregtbls')->where('course_id',$fetchimg->id)->where('userid',$uid)->first();
                        ?>
                        @if($cname=="")
                        <form action="/enroll/{{$fetchimg->id}}" method="post">
                        @csrf
                        <button type="submit" class="sigma_btn-custom section-button" >Enroll Now</button>
                        </form>
                        @else
                        <button type="submit" class="sigma_btn-custom section-button">Already Enrolled</button>
                        
                        @endif
                        <br><br><br> 
                        @if (session('mesg'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{session('mesg')}}</strong>
                        </div>
                        @endif

                      </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <div class="icon-box box-border text-center">
                     <i class="fas fa-dollar-sign "></i>
                        <h5 class="" style="font-size: 20px">Free Course</h5>
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
  <!-- end main-content -->



 


@endsection
