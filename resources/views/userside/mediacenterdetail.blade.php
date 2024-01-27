@extends("userside.layout")
@section("title")
<head>
<?php
    $ptitle = str_replace(' ', '%20', $mediacenter->title);
    $pdes = strip_tags($mediacenter->description);
    ?>
    <title> {{$mediacenter->title}}</title>
    <meta name="title" content="{{ $mediacenter->meta_title }}" />
    <meta name="description" content="{{ $mediacenter->meta_description }}" />
    <meta name="keywords" content="{{ $mediacenter->meta_keyword }}" />
    <meta property="og:image" content="http://digitalkidszone.com/uploads/mediacenter/{{ $mediacenter->image }}" />
    <meta property="og:url" content="http://digitalkidszone.com/mediacenterdetail/{{ $mediacenter->slug }}" />
    <meta property="og:type" content="website" />
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



<!-- Section: Experts Details -->
<section>
  <div class="container">
    <div class="section-content">
      <div class="row">
        <div class="col-md-4">
          <div class="thumb">
            <br>  <br>
            <img src="{{ asset('/uploads/mediacenter/' . $mediacenter->image) }}" 
            alt="{{ $mediacenter->title }}" width="300px" height="300px">
           
          </div>
          <ul>
            <h3>Share On:</h3>
          <?php
                                $url = urlencode("http://hariomsimran.com/usermediadetail/$ptitle/$mediacenter->id");
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
          <br>  <br>
          <h3 class="name font-24 " style="font-size: 40px">{{ $mediacenter->title }}</h3>
          
         
          <p>{!! html_entity_decode($mediacenter->description) !!}.</p>

          <p></p>
          <iframe width="560" height="315" src="{{$mediacenter->videourl}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          
          
        </div>
      </div>
    
    </div>
  </div>
</section>

</div>

@endsection