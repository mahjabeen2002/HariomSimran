@extends("userside.layout")
@section("title")
<head>
<title>Media | HariomSimran</title>
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
     
    
          <div class="col-lg-12">
            <div class="row">
              @if($fetchc>0)
              @foreach($mediacenter as $fe)
              <!-- Article Start -->
              <div class="col-md-4">
                <article class="sigma_post">
                  <div class="sigma_post-thumb">
                    @if ($fe->videourl != 'null')
                    <iframe src="{{ $fe->videourl }}" style="width: 100%;height: 200px" frameborder="0"></iframe>
                @elseif($fe->image != 'null')
                    <a href="/mediacenterdetail/{{ $fe->slug }}">


                        <img src="{{ asset('/uploads/mediacenter/' . $fe->image) }}" style="width: 100%;height: 200px" alt="Blog Images">
                @endif
                  
                  </div>
                  <div class="sigma_post-body">
                    <div class="sigma_post-meta">
                      <div class="me-3">
                       
                       
                      </div>
                     
                    </div>
                    <h5> <a href="/mediacenterdetail/{{$fe->slug}}">{{$fe->title}}</a> </h5>
                    <div class="sigma_post-single-author">
                   
                      <div class="sigma_post-single-author-content">
                        <?php
                              $f1 = strip_tags($fe->description);
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
          <h5 class="font-16 title"><a href="#" style="cursor:auto">No Media Center Found</a></h5>
         </div>
      </div>
    </div>
    @endif
           
            <!-- Pagination Start -->
            <ul class="pagination mb-0">
              {{$mediacenter->links()}}
            </ul>
            <!-- Pagination End -->
    
          </div>
         
        </div>
       
      </div>
    </div>
  </section>
  @endsection