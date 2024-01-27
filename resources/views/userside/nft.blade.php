@extends("userside.layout")
@section("title")
<head>
<title>NFTs | HariomSimran</title>
<meta name="description" content="NFTs Page" />
<meta name="keywords" content="HariomSimran" />
</head>
@endsection
@section("usercontent")
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(Mytemplate/assets/img/subheader.jpg)">

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
<section id="upcoming-nfts" class="divider parallax layer-overlay overlay-white-8" data-bg-img="Mytemplate/images/bg/bg1.jpg">
    <div class="container pb-50 pt-80">
      <div class="section-content">
        <div class="row">
        
            @foreach($fetchnft as $fn)

          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="schedule-box maxwidth500 bg-light mb-30">
              <div class="thumb">
                <img class="img-fullwidth" alt="" src="/nftimages/{{$fn->image}}" style="height: 200px;width: 100%">
                <div class="overlay">
               
                </div>
              </div>
              <div class="schedule-details clearfix p-15 pt-10">
                <h5 class="font-16 title"><a href="#">{{$fn->title}}</a></h5>
                <ul class="list-inline font-11 mb-20">
                  <li><i class="fa fa-calendar mr-5"></i> Unit Price:</li>
                  <li><i class=""></i>{{$fn->unitprice}}</li>
                </ul>
                <?php
                          $f1 = strip_tags($fn->short_des);
                          $f2 = Str::limit($f1,50);
                        
                         ?>
                <p>{{$f2}}</p>
                <div class="mt-10">
                 <a href="/nftdetail/{{$fn->title}}/{{$fn->id}}" class="btn btn-dark btn-sm mt-10">Details</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">{{$fetchnft->links()}}</div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>
  </section>
@endsection