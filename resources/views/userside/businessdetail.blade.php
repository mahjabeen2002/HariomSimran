@extends("userside.layout")
@section("title")
<head>
<?php
    $ptitle = str_replace(' ', '%20', $fetch->title);
    $pdes = strip_tags($fetch->description);
    ?>
    <title> {{$fetch->title}}</title>
<meta name="description" content="{{$pdes}}" />
<meta property="og:image" content="http://hariomsimran.com/busimages/{{$fetch->image}}" />
<meta property="og:url" content="http://hariomsimran.com/mantradetail/{{$ptitle}}/{{$fetch->id}}" />
<meta property="og:type" content="website" /> 
<meta name="keywords" content="HariomSimran" />
</head>
@endsection
@section("usercontent")

<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(../../Mytemplate/assets/img/subheader.jpg)">

  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Mantra</h1>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Mantra</li>
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
            <img src="{{ asset('/uploads/businesspromotion/' . $fetch->image) }}" alt="" width="300px" height="300px">
          </div> <br>
          <ul>
            <h3>Share On:</h3>
          <?php
                                $url = urlencode("http://hariomsimran.com/mantradetail/$ptitle/$fetch->id");
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
          <h3 class="name font-24 mt-0 mb-0" style="font-size: 40px">{{$fetch->title}}</h3>
          
        
          <p>{!! html_entity_decode($fetch->description) !!}.</p>
          <iframe width="560" height="315" src="{{$fetch->video_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        
        
        </div>
      </div>
    
    </div>
  </div>
</section>
 
@endsection