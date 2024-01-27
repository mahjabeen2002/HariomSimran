@extends("userside.layout")
@section('title')

<head>
<?php
    $pdes = strip_tags($f->title);
    ?>
<title>Topic Discussion Detail</title>
<meta name="description" content="{{$pdes}}" />
<meta property="og:url" content="http://hariomsimran.com/groupdetail/{{$f->id}}" />
<meta property="og:type" content="website" /> 
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

<style>
  body {
 font-family: Arial, sans-serif;
 background: url(http://amitchaudhary.in/images/testimonials.jpg) no-repeat;
 background-size: cover;
 height: 100vh;
}

h1 {
 text-align: center;
 font-family: Tahoma, Arial, sans-serif;
 color: #FF9800;
 margin: 80px 0;
}

.box {
 width: 50%;
 margin: 0 auto;
 background: rgba(53, 52, 52, 0.2);
 padding: 50px;
 border: 2px solid #fff;
 background-clip: padding-box;
 text-align: center;
}

.button {
 font-size: 1em;
 padding: 10px;
 color: #fff;
 border: 2px solid #FF9800;
 border-radius: 20px;
 text-decoration: none;
 cursor: pointer;
 transition: all 0.3s ease-out;
}
.button:hover {
 background: #06D85F;
}

.overlay {
 position: fixed;
 top: 50px;
 bottom: 0;
 left: 0;
 right: 0;
 background: rgba(0, 0, 0, 0.7);
 transition: opacity 500ms;
 visibility: hidden;
 opacity: 0;
}
.overlay:target {
 visibility: visible;
 opacity: 1;
}

.popup {
 margin: 70px auto;
 padding: 20px;
 background: #fff;
 border-radius: 5px;
 width: 30%;
 position: relative;
 transition: all 5s ease-in-out;
}

.popup h2 {
 margin-top: 0;
 color: #333;
 font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
 position: absolute;
 top: 20px;
 right: 30px;
 transition: all 200ms;
 font-size: 30px;
 font-weight: bold;
 text-decoration: none;
 color: #333;
}
.popup .close:hover {
 color: #06D85F;
}
.popup .content {
 max-height: 30%;
 overflow: auto;
}

@media screen and (max-width: 700px){
 .box{
 width: 70%;
 }
 .popup{
 width: 70%;
 }
}



  .comment-thread {
    width: 700px;
    max-width: 100%;
    margin: auto;
    padding: 0 30px;
    background-color: #fff;
    border: 1px solid transparent; /* Removes margin collapse */
}
.m-0 {
    margin: 0;
}
.sr-only {
    position: absolute;
    left: -10000px;
    top: auto;
    width: 1px;
    height: 1px;
    overflow: hidden;
}

/* Comment */

.comment {
    position: relative;
    margin: 20px auto;
}
.comment-heading {
    display: flex;
    align-items: center;
    height: 50px;
    font-size: 14px;
}
.comment-voting {
    width: 20px;
    height: 32px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 4px;
}
.comment-voting button {
    display: block;
    width: 100%;
    height: 50%;
    padding: 0;
    border: 0;
    font-size: 10px;
}
.comment-info {
    color: rgba(0, 0, 0, 0.5);
    margin-left: 10px;
}
.comment-author {
    color: rgba(0, 0, 0, 0.85);
    font-weight: bold;
    text-decoration: none;
}
.comment-author:hover {
    text-decoration: underline;
}
.replies {
    margin-left: 20px;
}
</style>
<br><br>
<div class="main-content bg-lighter">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="../Mytemplate/images/bg/bg6.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white text-center">Topic Discussion Detail</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="/">Home</a></li>
                <li class="active text-gray-silver">Topic Discussion Detail</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
<br><br>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h3>Discusion Topic</h3>
            <h4>{!! html_entity_decode($f->title) !!}</h4>
            <?php
            $fid = 0;
            $fetchm = DB::table('groupmessages')->where('group_id',$f->id)->where('replyid',0)->get();
            $fetchmc = DB::table('groupmessages')->where('group_id',$f->id)->where('replyid',0)->count();
            ?>
            <hr>
            <div class="comment-thread">
    <!-- Comment 1 start -->
    @if($fetchmc>0)
            @foreach($fetchm as $fm)
            <?php
            $fid = $fm->id;
            ?>
           
    <div class="comment" id="messageid{{$fm->id}}" >
  
        <div class="comment-heading">
            <div class="comment-info">
                <a href="#" class="comment-author">{{$fm->name}}</a>
                <p class="m-0">
                    {{$fm->email}} &bull; {{$fm->contact}}
                </p>
            </div>
        </div>

        <div class="comment-body">
            <p>
              {{$fm->message}}
               </p>
              
               @if(session('ida'))
               <p class="m-0">
               <a  style="color:green;cursor:pointer" href="#editpopup1{{$fm->id}}">
                    Edit
                     </a>  &bull;  <a href="" id="deletem{{$fm->id}}" class="deleteidm" style="color:red">Delete</a>
                    <input type="hidden" name="" value="{{$fm->id}}" class="mid">
                  </p>
                @endif
              

               
                @if(session('id1'))
                 @if(session('id1') == $fm->user_id)
                 <p class="m-0">
               <a  style="color:green;cursor:pointer" href="#editpopup1{{$fm->id}}">
                    Edit
                     </a>  &bull;  <a href="" id="deletem{{$fm->id}}" class="deleteidm" style="color:red">Delete</a>
                    <input type="hidden" name="" value="{{$fm->id}}" class="mid">
                  </p>
                 
                @endif
                @endif

               <a class="btn btn-primary" href="#popup1{{$fm->id}}">
                Add Comment
                </a>
              <?php
           $fetchc = DB::table('groupmessages')->where('group_id',$f->id)->where('replyid',$fid)->count();
            ?>
             <a  class="comment-author btn btn-primary" >Total : {{$fetchc}} comments</a>
              
             @if($fetchc>0)
             <div class="cart-itm1">
              <br>
             <a  class="comment-author btn btn-primary showhide" id="showhide{{$fid}}">View all Comments</a>
             <input type="hidden" name="" value="{{$fid}}" class="frid">
           </div>
             @endif
             <div id="popup1{{$fm->id}}" class="overlay">
              <div class="popup">
              <h2>Add your Comments</h2>
              <hr>
              <a class="close" href="#">×</a>
              <div class="content">
              <form action="/submitmessagereply/{{$fm->id}}"  method="post">
                          @csrf
                          @if(session('id1') || session('ida'))
                          <?php
                          $user = DB::table('users')->where('id',session('id1'))->orwhere('id',session('ida'))->first();
                          ?>
                          
                          <label for="">Name</label>
                          <input type="text" class="form-control" name="name" readonly value="{{session('cname') ?? session('uname')}}" id="">
                          <br>
                          @if($user->email)
                          <label for="">Email</label>
                          <input type="email" class="form-control" name="email" readonly value="{{$user->email}}" id="">
                          <br>
                          @else
                          <label for="">Email</label>
                          <input type="email" class="form-control" name="email" required placeholder="Email..." id="">
                          <br>
                          @endif
                          
                         
                          @else
                          <label for="">Name</label>
                          <input type="text" class="form-control" required name="name" placeholder="Name..." id="">
                          <br>
                          <label for="">Email</label>
                          <input type="text" class="form-control" required name="email" placeholder="Email..." id="">
                          <br>
                         
                          @endif
                          <label for="">Contact</label>
                          <input type="text" class="form-control" required name="contact" placeholder="Contact.." id="">
                          <br>
                          <label for="">Message</label>
                          <textarea class="form-control" name="message" required placeholder="Message Here..." id=""></textarea>
                          <input type="hidden" name="group_id" value="{{$f->id}}">
                          <br>
                          <input type="submit" class="form-control btn btn-primary" value="Submit your comments">
                        </form>
              </div>
              </div>
              </div>
              
            
        </div>


           <!-- ++++++++++++++++++++UPDATE Message +++++++++++++++++++++++ -->
           <div id="editpopup1{{$fm->id}}" class="overlay">
            <div class="popup">
            <h2>update Comments</h2>
            <hr>
            <a class="close" href="#">×</a>
            <div class="content">
            <form action="/updatemessagereply/{{$fm->id}}"  method="post">
     
              @csrf

               <label for="">Id</label>
              <input type="text" class="form-control" value="{{$fm->id}}" name="recordid" required id="recordid" readonly>
              <br>
              <label for="">Message Edit</label>
              <textarea type="text" class="form-control" name="message" required id="recordmr" id="">{{$fm->message}}</textarea>
              <br>
              
             
          
     
         <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update</button>
        </form>
            </div>
            </div>
            </div>





        <div id="show{{$fm->id}}" style="display:none">
        <?php
            $fetchr = DB::table('groupmessages')->where('group_id',$f->id)->where('replyid',$fid)->get();
            $fetchrc = DB::table('groupmessages')->where('group_id',$f->id)->where('replyid',$fid)->count();
            ?>

            @if($fetchrc>0)
            @foreach($fetchr as $fr)
      <div class="replies" id="cartref{{$fr->id}}">
     
            <div class="comment" >
           
                <div class="comment-heading">
                   
                    <div class="comment-info">
                        <a href="#" class="comment-author">{{$fr->name}}</a>
                        <p class="m-0">
                           {{$fr->email}} &bull; {{$fr->contact}}
                        </p>
                    </div>
                     </div>
              

                <div class="comment-body">
                    <p>
                    {{$fr->message}}
                    </p>
                    @if(session('ida'))
                    <p class="m-0">
                    <a  style="color:green;cursor:pointer"  href="#editpopup{{$fr->id}}">
                    Edit
                     </a> &bull;  <a href="" id="delete{{$fr->id}}" class="deleteid" style="color:red">Delete</a>
                    <input type="hidden" name="" value="{{$fr->id}}" class="rid">
                </p>
               
                @endif

                
                @if(session('id1'))
                 @if(session('id1') == $fr->user_id)
                    <p class="m-0">
                    <a  style="color:green;cursor:pointer"  href="#editpopup{{$fr->id}}">
                    Edit
                     </a> &bull;  <a href="" id="delete{{$fr->id}}" class="deleteid" style="color:red">Delete</a>
                    <input type="hidden" name="" value="{{$fr->id}}" class="rid">
                </p>
                @endif    
                
                @endif
                   
                </div>
            </div>
         

            <!-- ++++++++++++++++++++UPDATE Message reply+++++++++++++++++++++++ -->
            <div id="editpopup{{$fr->id}}" class="overlay">
            <div class="popup">
            <h2>update Comments</h2>
            <hr>
            <a class="close" href="#">×</a>
            <div class="content">
            <form action="/updatemessagereply/{{$fr->id}}"  method="post">
     
              @csrf

               <label for="">Id</label>
              <input type="text" class="form-control" value="{{$fr->id}}" name="recordid" required id="recordid" readonly>
              <br>
              <label for="">Message Edit</label>
              <textarea type="text" class="form-control" name="message" required id="recordmr" id="">{{$fr->message}}</textarea>
              <br>
              
             
          
     
         <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update</button>
        </form>
            </div>
            </div>
            </div>


     
      
    </div>
    @endforeach
           @endif
</div>
          
           <div class="cart-itm">
           <a  class="comment-author btn btn-info hidecomment" style="display:none" id="hidecomment{{$fid}}" >Hide Comments</a>
           <input type="hidden" name="" value="{{$fid}}" class="frid">
           </div>
           
  
    <!-- Comment 1 end -->
</div>
@endforeach
   @endif
      </div>
           
<br>
      <h4 style="border-top:2px solid black">Submit your Comments</h4>
             
            <form action="/submitreply/{{$f->id}}"  method="post">
              @csrf
              @if(session('id1') || session('ida'))
                          <?php
                         $user = DB::table('users')->where('id',session('id1'))->orwhere('id',session('ida'))->first();
                          ?>
                          
                          <label for="">Name</label>
                          <input type="text" class="form-control" name="name" readonly value="{{session('cname') ?? session('uname')}}" id="">
                          <br>
                          @if($user->email)
                          <label for="">Email</label>
                          <input type="email" class="form-control" name="email" readonly value="{{$user->email}}" id="">
                          <br>
                          @else
                          <label for="">Email</label>
                          <input type="email" class="form-control" name="email" required placeholder="Email..." id="">
                          <br>
                          @endif
                         
                         
                          
              @else
              <label for="">Name</label>
              <input type="text" class="form-control" required name="name" placeholder="Name..." id="">
              <br>
              <label for="">Email</label>
              <input type="email" class="form-control" required name="email" placeholder="Email..." id="">
              <br>
              
              @endif
              <label for="">Contact</label>
              <input type="text" class="form-control" required name="contact" placeholder="Contact..." id="">
              <br>
              <label for="">Message</label>
              <textarea class="form-control" name="message" required placeholder="Message Here..." id=""></textarea>
              <br>
              <input type="submit" class="form-control btn btn-primary" value="Send">
              <br><br>
            </form>


          
        </div>
        <div class="col-md-1"></div>





</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $('.showhide').click(function(){
                var fid = $(this).closest('.cart-itm1').find('.frid').val();
                $('#show'+fid).show();
                $('#hidecomment'+fid).show();
                $('#showhide'+fid).hide();
                
            });
   $('.hidecomment').click(function(){
                var cartid = $(this).closest('.cart-itm').find('.frid').val();
                $('#show'+cartid).hide();
                $('#hidecomment'+cartid).hide();
                $('#showhide'+cartid).show();
            });


                //remove messages reply
                $('.deleteid').click(function(){
                var cartid = $(this).closest('.comment-body').find('.rid').val();
                // alert(cartid);
                $.ajax({
                    url: "/removemessager",
                    type: 'post',
                    dataType: 'json', 
                    data:"cartid="+cartid+
                '&_token={{csrf_token()}}',
                    success: function (res) {
                       $('#cartref'+cartid).remove();
                    }
                });
            });

               //remove messages
               $('.deleteidm').click(function(){
                var cartid = $(this).closest('.comment-body').find('.mid').val();
               
                $.ajax({
                    url: "/removemessage",
                    type: 'post',
                    dataType: 'json', 
                    data:"cartid="+cartid+
                '&_token={{csrf_token()}}',
                    success: function (res) {
                       $('#messageid'+cartid).remove();
                    }
                });
            });
           
        
</script>



@endsection