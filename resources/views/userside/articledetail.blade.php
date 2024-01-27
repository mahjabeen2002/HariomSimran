@extends("userside.layout")
@section("title")
<head>
<?php
    $ptitle = str_replace(' ', '%20', $fetchart->title);
    $pdes = strip_tags($fetchart->description);
    ?>
    <title> {{$fetchart->title}}</title>
<meta name="description" content="{{$pdes}}" />
<meta property="og:image" content="http://hariomsimran.com/uploads/article/{{$fetchart->image}}" />
<meta property="og:url" content="http://hariomsimran.com/articledetail/{{$fetchart->slug}}" />
<meta property="og:type" content="website" /> 
<meta name="keywords" content="learndigital" />
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
          <li class="breadcrumb-item active" aria-current="page">Articles</li>
        </ol>
      </nav>
    </div>
  </div>

</div>
<br><br>

<section>
  <div class="container">
    <div class="section-content">
      <div class="row">
        <div class="col-md-4">
          <div class="thumb">
            <img src="{{ asset('/uploads/article/' . $fetchart->image) }}" alt="" width="300px" height="300px">
          </div>
          <div class="sigma_post-single-author">
                                               
            <div class="sigma_post-single-author-content">
              <?php
                $f = DB::table('users')->where('id',$fetchart->user_id)->first();
                ?>
          <i class="far fa-user"></i> &nbsp; Posted  By <p>{{ $f->name }}</p>
            </div>
          </div>
          {{-- <a class="sigma_post-date"> <i class="far fa-user"></i><span>Posted By &nbsp;{{$fetchart->user_id}}</span></a> --}}
          <ul>
            <br>
            <h3>Share On:</h3>
          <?php
                                $url = urlencode("http://hariomsimran.com/articledetail/$fetchart->slug");
                                ?> <a style="background-color:#f0c2c2" target="_blank" href="https://www.facebook.com/sharer.php?u={{$url}}" class="btn btn--small btn--secondary fab fa-facebook-f" title="Share on Facebook">
                                    <i style="color:black" class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title sizeicon" aria-hidden="true"></span>
                                </a>
                                 <a style="background-color:#f0c2c2" target="_blank" href="https://twitter.com/share?url={{$url}}" class="btn btn--small btn--secondary fab fa-twitter" title="Tweet on Twitter">
                                    <i style="color:black" class="fa fa-twitter" aria-hidden="true"></i> <span class="share-titl sizeicon" aria-hidden="true"></span>
                                </a> 
                                 <a style="background-color:#f0c2c2" href="https://api.whatsapp.com/send?phone=&text=<?php urlencode("hi hello")?> {{$url}}" target="_blank" title="Share on Whatsapp" class="btn btn--small btn--secondary fab fa-whatsapp">
                                    <i style="color:black" class="fa fa-whatsapp" aria-hidden="true"></i> <span class="share-title sizeicon" aria-hidden="true"></span>
                                </a> 
                                <a style="background-color:#f0c2c2" target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{$url}}" class="btn btn--small btn--secondary fab fa-pinterest" title="Pin on Pinterest">
                                    <i style="color:black" class="fa fa-linkedin" aria-hidden="true"></i> <span class="share-title sizeicon" aria-hidden="true"></span>
                                </a>
         </ul>
        </div>
        <div class="col-md-8">
          <h3 class="" style="font-size: 30px">{{$fetchart->title}} </h3>
          <a class="sigma_post-date"> <i class="far fa-calendar"></i><span>{{$fetchart->date}}</span></a>
          <?php

          $pv = DB::table('categories')->where('id',$fetchart->category_id)->first();
          ?>
         <a class="sigma_post-date">   <i class="fas fa-om"></i> <span>{{$pv->title}}</span> </a>
          <p>{!! html_entity_decode($fetchart->description) !!}.</p>
          <p></p>
          <iframe width="560" height="315" src="{{$fetchart->videourl}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          
        </div>
      </div>
    
    </div>
  </div>
</section>
 
@endsection