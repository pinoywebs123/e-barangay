<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Esumbong Dashboard</title>

    
    <link href="{{URL::to('css/bootstrap.min.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('css/sb-admin.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('css/plugins/morris.css')}}" rel="stylesheet">

    
    <link href="{{URL::to('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

  

<style type="text/css">
    #txt{
        font-size: 48px;
    }
    .navbar {
     background: #2c3e50 !important;
   }
   #sides ul {
    background: #2c3e50 !important;
   }
   body {
    background: #2c3e50;
   }
</style>

</head>

<body>

    <div id="wrapper">

       
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" data-toggle="modal" data-target="#test">Esumbong</a>
            </div>
            
            <ul class="nav navbar-right top-nav">
               
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Account <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                        
                        <li>
                            <a href="{{route('admin_profile')}}"><i class="fa fa-fw fa-gear"></i> Profile</a>
                        </li>
                         <li>
                            <a href="{{route('admin_setting')}}"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('admin_logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
           
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="sides">
                <ul class="nav navbar-nav side-nav">
                	
                    <li>
                      <a href="{{route('admin_home')}}" ><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                     <li class="active">
                    	<a href="{{route('admin_main')}}" ><i class="glyphicon glyphicon-volume-up"></i> Announcement</a>
                    </li>
                     <li>
                        <a href="{{route('admin_request')}}"><i class="glyphicon glyphicon-folder-open"></i> Request</a>
                    </li>
                    <li>
                        <a href="{{route('admin_blotter')}}"><i class="glyphicon glyphicon-file"></i> Blotter</a>
                    </li>
                     <li>
                        <a href="{{route('admin_patawag')}}"><i class="glyphicon glyphicon-volume-up"></i> Patawag</a>
                    </li>
                   	<li>
                        <a href="{{route('admin_missing')}}"><i class="glyphicon glyphicon-picture"></i> Missing</a>
                    </li>
                    <li>
                    	<a href="{{route('admin_user_list')}}"><i class="glyphicon glyphicon-user"></i> USERS</a>
                    </li>
                    
                </ul>
            </div>
           
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

               
              <div class="col-md-6">
                <h2 class="text-center">Post Anouncements</h2>
                @if(Session::has('err'))
                  <div class="alert alert-danger">{{Session::get('err')}}</div>
                @endif
                
                 @if(Session::has('info'))
                    <div class="alert alert-success">{{Session::get('info')}}</div>
                   @endif
              	<form action="{{route('admin_new_announcement')}}" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Title Headline</label>
                    <input type="text" name="title" class="form-control" required="">
                  </div>
                   <div class="form-group">
                       <textarea name="anouncement" class="form-control" rows="5" required=""></textarea>
                   </div> 
                    <div class="form-group">
                      <label>Photo</label>
                      <input type="file" name="image" class="form-control" required="">
                    </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-primary">Submit</button>
                       {{csrf_field()}}
                   </div>
                </form>

               
              </div>
              <div class="col-md-6">
              <h2 class="text-center">Anouncements</h2>

                   @if($gets->count() > 0)
                  @foreach($gets as $ako)
                    <div class="media">
                      <div class="media-left">
                        <a target="_blank" href="{{URL::to('announcement/'.$ako->image)}}">
                          <img class="media-object" src="{{URL::to('announcement/'.$ako->image)}}" width="64px">
                        </a>
                      </div>
                      <div class="media-body">
                        
                        <p>{{$ako->content}}</p>
                        <small>{{$ako->created_at->diffForHumans()}}</small>
                      </div>
                    </div>
                    <hr>

                  @endforeach

                  <center>{{$gets->links()}}</center>
                @else
                  <h3>NO Announcement yet!</h3>
                @endif
              </div>
                
               

               

               
                    
                    

            </div>
           

        </div>
       
       

    </div>
   

   
    <script src="{{URL::to('js/jquery.js')}}"></script>

    
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>

    
    <script src="{{URL::to('js/plugins/morris/raphael.min.js')}}"></script>
    <script src="{{URL::to('js/plugins/morris/morris.min.js')}}"></script>
    <script src="{{URL::to('js/plugins/morris/morris-data.js')}}"></script>

</body>

</html>
