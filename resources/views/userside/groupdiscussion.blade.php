@extends("userside.layout")
@section('title')
<head>
<title>Discussion Topics | HariomSimran</title>
<meta name="description" content="Discussion Topics Page" />
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
<div class="container">
      
<div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            @if($fetchgroupc>0)
        <table class="table table-responsive">
  <thead>
    <tr>

      <th scope="col">Discussion Topic</th>
      <th scope="col" colspan="1">Action</th>
    </tr>
  </thead>

  <tbody>

  @foreach($fetchgroup as $fa)
   <tr>
    <?php
      //  $groupd = DB::table('creategroups')->where('id',$fa->group_id)->first();
       $user = DB::table('users')->where('id',$fa->user_id)->first();
    ?>
    <td style="font-size:22px">{!! html_entity_decode($fa->title) !!} </td>
    <?php
    $pdes = strip_tags($fa->title);
    ?>
    <td><a href="/groupdetail/{{$fa->id}}" class="btn btn-danger">Add Your Comments/Views</a></td>
   </tr>
   @endforeach

  </tbody>
</table>
<br>
{!! $fetchgroup->links() !!}
@else
<table class="table table-responsive">
    <tr>
        <th>No Discussion Topics</th>
    </tr>
</table>
@endif
        </div>
        <div class="col-md-1"></div>
</div>

</div>
</div>
@endsection