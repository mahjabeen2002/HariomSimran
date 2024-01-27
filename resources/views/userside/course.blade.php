@extends("userside.layout")
@section("title")
<head>
<title>Course | HariomSimran</title>
<meta name="description" content="Course Page" />
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
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12 blog-pull-right">
           <div class="row">
              <div class="col-md-4">
                  <table class="table">
                      <tr>
                        <br>
                          <th>Course Category</th>
                      </tr>
                      @foreach($fetchacat as $f)
                      <tr>
                              <td><a href="/courses/{{$f->category_name}}/{{$f->id}}">{{$f->category_name}}</a></td>
                      </tr>
                      @endforeach
                       </table>
              </div>
              
              <div class="col-md-8">
              <div class="row">
                @if($fetchc>0)
          @foreach($fetchcourse as $fc)
            <div class="col-sm-10 col-md-6">
          <div class="sigma_portfolio-item">
            <img src="../../courseimages/{{$fc->c_image}}" style="height: 200px;width: 100%" alt="portfolio">
            <div class="sigma_portfolio-item-content">
              <div class="sigma_portfolio-item-content-inner">
                <h5> <a href="/subcourse/{{$fc->Title}}/{{$fc->id}}">{{ $fc->Title }}</a </h5>
                  <?php

                  $pv = DB::table('categorytbls')->where('id',$fc->categoryid)->first();
                  ?>
                <p><a class="sigma_post-category">Category : {{$pv->category_name}}</a></p>  
              </div>
              <a href="/subcourse/{{$fc->Title}}/{{$fc->id}}"><i class="fal fa-plus"></i></a>
            </div>
          </div>
            </div>
       
             
          @endforeach
          </div>
          @else
          <div class="col-sm-6 col-md-3">
                <div class="project mb-30 border-2px">
                
                <div class="project-details p-15 pt-10 pb-10">
                  <h4 class="font-weight-700 text-uppercase mt-0 text-center"><a href="#" style="cursor:auto">No Course Found</a></h4>
                  </div>
                </div>
              </div>
          @endif
            <ul class="pagination mb-0">
        {{$fetchcourse->links()}}
      </ul>

      <br>
          </div>
           </div>
        </div>

      </div>
    <!-- Section: Course gird -->

  </div>
  <!-- end main-content -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->

@endsection
