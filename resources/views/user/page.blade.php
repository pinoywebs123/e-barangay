@extends('template.default')

@section('styles')
<link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />

<style type="text/css">
   a.fancybox img {
        border: none;
        box-shadow: 0 1px 7px rgba(0,0,0,0.6);
        -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out;
    } 
    a.fancybox:hover img {
        position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
    }

  body {
    background: #2c3e50;
  }
  #heads{
    margin-top: -40px;
    color: #fff;
  }
  img{
    z-index: -9999;
  }
  article {
    margin-top: 20px;
  }
</style>
@endsection

@section('contents')
   <div id="aw">
       <img src="{{URL::to('image/test.jpg')}}" width="100%" height="320px">
       <h2 class="text-center" id="heads">Barangay Tagapo E-Sumbong</h2>
   </div>
   <div>
       <div class="col-md-3 well">
           <ul class="nav nav-pills nav-stacked">
              <li role="presentation" class="active"><a href="{{route('user_main')}}">Home</a></li>
              <li role="presentation"><a href="{{route('user_request')}}">Request</a></li>
              <li role="presentation"><a href="{{route('user_blotter')}}">Blotter</a></li>
              <li role="presentation"><a href="{{route('user_missing')}}">Missing</a></li>
              <li role="presentation"><a href="{{route('user_about')}}">Account</a></li>
              <li role="presentation" ><a href="{{route('user_settings')}}">Settings</a></li>
              <li role="presentation"><a href="{{route('user_logout')}}">Logout</a></li>
            </ul>
       </div>

       <div class="col-md-9 well">
           
          <h3><span class="glyphicon glyphicon-volume-up"> Announcements: </span></h3>
           <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="text-center">{{$wak->title}}</h3>
              </div>
              <div class="panel-body">
                <div class="col-md-8">
                 <mark>{{$wak->created_at->toDayDateTimeString()}}</mark>
                  <article>
                    {{$wak->content}}
                  </article>
                </div>
                <div class="col-md-4">
                  <img src="{{URL::to('announcement/'.$wak->image)}}" width="200px">
                </div>
              </div>
           </div>
       </div>
   </div>
@endsection

@section('scripts')
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
<script type="text/javascript">
    $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
</script>
@endsection