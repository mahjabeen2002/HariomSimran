@extends("userside.layout")
@section("title")

<head>
    <title>Certificate | HariomSimran</title>
<meta name="description" content="Certificate Page" />
<meta name="keywords" content="HariomSimran" />
</head>
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">


    <style>
.search-container{
    background: #7e4555;-
    height: 30px;
    border-radius: 30px;
    padding: 10px 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: 0.8s;
    /*box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
    inset -7px -7px 10px 0px rgba(0,0,0,.1),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
   text-shadow:  0px 0px 6px rgba(255,255,255,.3),
              -4px -4px 6px rgba(116, 125, 136, .2);
  text-shadow: 2px 2px 3px rgba(255,255,255,0.5);*/
  box-shadow:  4px 4px 6px 0 rgba(255,255,255,.3),
              -4px -4px 6px 0 rgba(116, 125, 136, .2), 
    inset -4px -4px 6px 0 rgba(255,255,255,.2),
    inset 4px 4px 6px 0 rgba(0, 0, 0, .2);
}

.search-container:hover > .search-input{
    width: 400px;

}

.search-container .search-input{
    background: transparent;
    border: none;
    outline:none;
    width: 0px;
    font-weight: 500;
    font-size: 16px;
    transition: 0.8s;

}

.search-container .search-btn .fas{
    color: #7e4555;
}

@keyframes hoverShake {
  0% {transform: skew(0deg,0deg);}
  25% {transform: skew(5deg, 5deg);}
  75% {transform: skew(-5deg, -5deg);}
  100% {transform: skew(0deg,0deg);}
}

.search-container:hover{
  animation: hoverShake 0.15s linear 3;
}
    </style>
</head>
@endsection
@section("usercontent")

<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(Mytemplate/assets/img/subheader.jpg)">

    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>Certificate Verification</h1>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Certificate Verification</li>
          </ol>
        </nav>
      </div>
    </div>
  
  </div>
  <br><br>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="{{URL::to('/search')}}" method="POST">
            @csrf
            <div class="search-container">
                <input type="text" name="search_input" placeholder="Enter Your Certificate Id To Verify Your Certificate" class="search-input">
                <button  type="submit" class="search-btn">
                        <i class="fas fa-search"></i>      
                </button>
            </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<br>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if(isset($certificate))
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Certificate Id</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Insitute Name</th>
                        <th scope="col"> Heading</th>
                        <th scope="col"> Description</th>
                        <th scope="col">Issue Date</th>
                        <th scope="col">View Certificate</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($certificate) >0)
                        @foreach($certificate as $c)
                            <tr>
                                <td>{{$c->verification_code}}</td>
                                <?php
                                $f = DB::table('users')->where('id',$c->user_id)->first();
                                ?>
                            <td>{{ $f->name }}</td>
                                <td>{{$c->institute_name}}</td>
                                <td>{{$c->heading}}</td>
                                <td>{{$c->description}}</td>
                                <td>{{$c->issue_date}}</td>
                                {{-- <td>{{$c->partdate}}</td> --}}
                                <td> <a href="{{ route('view_certificate', ['id' => $c->id]) }}" style="margin-left: 10px;">
                                   <i class="fa fa-eye" aria-hidden="true"></i>
                                </a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                </table>
                <br><br><br><br><br><br>
            @endif

        </div>
    </div>
</div>
        



@endsection