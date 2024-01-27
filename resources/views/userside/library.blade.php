@extends("userside.layout")
@section("title")
<head>
<title>Library | HariomSimran</title>
<meta name="description" content="Library Page" />
<meta name="keywords" content="HariomSimran" />
</head>
@endsection
@section("usercontent")
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(../../Mytemplate/assets/img/subheader.jpg)">

  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Library</h1>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Library</li>
        </ol>
      </nav>
    </div>
  </div>

</div>
<br><br>
<div class="section">
  <div class="container">

    <div class="row">

      <div class="col-md-4">
        <table class="table">
            <tr>
                <th>Library Category</th>
            </tr>
            @foreach($fetchlcat as $f)
            <tr>
                    <td><a href="/library/{{$f->category_name}}/{{$f->id}}">{{$f->category_name}}</a></td>
            </tr>
            @endforeach
             </table>
    </div>

      <div class="col-lg-8">
        <div class="row">

          @if($fetchc>0)
          @foreach($fetchmedia as $fe)

          <!-- Article Start -->
          <div class="col-md-6">
            <article class="sigma_post">
              <div class="sigma_post-thumb">
                <a href="/librarydetail/{{$fe->title}}/{{$fe->id}}">
                  <img src="/libraryimages/{{$fe->image}}" style="height: 200px;width: 100%" alt="post">
                </a>
              </div>
              <div class="sigma_post-body">
                <div class="sigma_post-meta">
                  <div class="me-3">
                    <i class="fas fa-om"></i>
                    <?php
                    $type = DB::table('libcategories')->where('id',$fe->type)->first();
                    ?>
                    <a class="sigma_post-category">{{ $type->category_name ?? "" }}</a>
                   
                  </div>
                 
                </div>
                <h5> <a href="/librarydetail/{{$fe->title}}/{{$fe->id}}">{{$fe->title}}</a> </h5>
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
        @else
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="schedule-box maxwidth500 bg-light mb-30">
           <div class="schedule-details clearfix p-15 pt-10">
              <h5 class="font-16 title"><a href="#" style="cursor:auto">No Library Found</a></h5>
             </div>
          </div>
        </div>
       @endif
        <!-- Pagination Start -->
        <ul class="pagination mb-0">
          {{$fetchmedia->links()}}
        </ul>
        <!-- Pagination End -->

      </div>

    </div>

  </div>
</div>
@endsection