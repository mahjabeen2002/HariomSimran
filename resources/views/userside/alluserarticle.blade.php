@extends("userside.layout")
@section("title")
<head>
<title>All Articles | HariomSimran</title>
<meta name="description" content="Annoncement Page" />
<meta name="keywords" content="HariomSimran" />
</head>
@endsection
@section("usercontent")
 
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(../../Mytemplate/assets/img/subheader.jpg)">

  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Articles</h1>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Articles->Posted By Users</li>
        </ol>
      </nav>
    </div>
  </div>

</div>
<br><br>
     <!-- Categories Start -->

  <!-- Categories End --> <!-- Section: Course gird -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12 blog-pull-right">
           <div class="row">
              <div class="col-md-4">
                <table class="table">
                  <tr>
                    <br>
                    <th>Articles</th>
                  </tr>
                  
                  <tr>
                          <td><a href="/alluserarticle/">Posted By Users</a></td>
                  </tr>
                    <tr>
                          <td><a href="/alluarticle">Posted By Admin</a></td>
                  </tr>
             
                   </table>
                  <table class="table">
                      <tr>
                        <br>
                        <th>Category</th>
                      </tr>
                      @foreach($fetchacat as $f)
                      <tr>
                              <td><a href="/userart/{{$f->category_name}}/{{$f->id}}">{{$f->category_name}}</a></td>
                      </tr>
                      @endforeach
                       </table>
              </div>
              <div class="col-lg-8">
                <div class="row">
        
                  @foreach($fetchart as $fa1)
                  <!-- Article Start -->
                  <div class="col-md-6">
                    <article class="sigma_post">
                      <div class="sigma_post-thumb">
                        <a href="/userarticledetail/{{$fa1->headline}}/{{$fa1->id}}">
                          <img src="/articleimages/{{$fa1->image}}" style="height: 200px;width: 100%" alt="post">
                        </a>
                      </div>
                      <div class="sigma_post-body">
                        <div class="sigma_post-meta">
                          <div class="me-3">
                            <i class="fas fa-om"></i>
                            <?php
        
                            $pv = DB::table('allcategorytbls')->where('id',$fa1->type)->first();
                            ?>
                            <a class="sigma_post-category">{{$pv->category_name}}</a>
                           
                          </div>
                          <a class="sigma_post-date"> <i class="far fa-calendar"></i> {{$fa1->art_date}}</a>
                        </div>
                        <h5> <a href="/userarticledetail/{{$fa1->headline}}/{{$fa1->id}}">{{$fa1->headline}}</a> </h5>
                        <div class="sigma_post-single-author">
                       
                          <div class="sigma_post-single-author-content">
                            <?php
                                  $f1 = strip_tags($fa1->short_Des);
                                  $f2 = Str::limit($f1,70);
                                
                                 ?>
                        <p>{{$f2}}</p>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                  <!-- Article End -->
        @endforeach
                </div>
                <!-- Pagination Start -->
                <ul class="pagination mb-0">
                  {{$fetchart->links()}}
                </ul>
                <!-- Pagination End -->
        
              </div>
        
            </div>
        
          </div>
        </div>

    </div>




@endsection