@extends("userside.layout")
@section("title")
<head>
<title>All Media | HariomSimran</title>
<meta name="description" content="Media Page" />
<meta name="keywords" content="HariomSimran" />
</head>
@endsection
@section("usercontent")
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(../../Mytemplate/assets/img/subheader.jpg)">

  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Media Center</h1>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Media Center</li>
        </ol>
      </nav>
    </div>
  </div>

</div>

<div class="section">
  <div class="container">

    <div class="row">
     
          <div class="col-md-4">
            <table class="table">
                <tr>
                    <th>Media Center Category</th>
                </tr>
                @foreach($fetchacat as $f)
                <tr>
                        <td><a href="/usermedia/{{$f->category_name}}/{{$f->id}}">{{$f->category_name}}</a></td>
                      </tr>
                @endforeach
                 </table>
        </div>
        <div class="col-lg-8">
          <div class="row">
  
            @foreach($fetchmedia1 as $fe)
            <!-- Article Start -->
            <div class="col-md-6">
              <article class="sigma_post">
                <div class="sigma_post-thumb">
                  <a href="/usermediadetail/{{$fe->headline}}/{{$fe->id}}">
                    <img src="/mediaimages/{{$fe->image_video}}" style="height: 200px;width: 100%" alt="post">
                  </a>
                </div>
                <div class="sigma_post-body">
                  <div class="sigma_post-meta">
                    <div class="me-3">
                      <i class="fas fa-om"></i>
                      <?php
  
                      $pv = DB::table('allcategorytbls')->where('id',$fe->type)->first();
                      ?>
                      <a class="sigma_post-category">{{$pv->category_name}}</a>,
                     
                    </div>
                    <a class="sigma_post-date"> <i class="far fa-calendar"></i> {{$fe->media_date}}</a>
                  </div>
                  <h5> <a href="/usermediadetail/{{$fe->headline}}/{{$fe->id}}">{{$fe->headline}}</a> </h5>
                  <div class="sigma_post-single-author">
                 
                    <div class="sigma_post-single-author-content">
                      <?php
                            $f1 = strip_tags($fe->short_Des);
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
            {{$fetchmedia1->links()}}
          </ul>
          <!-- Pagination End -->
  
        </div>
  
      </div>
  
    </div>
  </div>
      
             
@endsection