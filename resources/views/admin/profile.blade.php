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
    span {
      font-size: 40px;
    }
    .pull-left{
      margin-right: 50px;
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Account<b class="caret"></b></a>
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
                	
                    <li class="active">
                      <a href="{{route('admin_home')}}" ><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                     <li >
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
        <div class="panel panel-default">
          <div class="panel-heading">
            
          </div>
          <div class="panel-body">
            <div class="col-md-6">
           <ul class="list-group text-center">
              <li class="list-group-item"><strong>My Profile</strong></li>
              <li class="list-group-item"><img src="{{URL::to('profile/'.Auth::user()->image)}}" width="64px" class="img-circle"></li>
              <li class="list-group-item">Name: {{Auth::user()->fname}} {{Auth::user()->lname}}</li>
              <li class="list-group-item">Contact: {{Auth::user()->contact}}</li>
              <li class="list-group-item">Email: {{Auth::user()->email}}</li>
             <li class="list-group-item">Address: {{Auth::user()->address}}</li>
              <li class="list-group-item">Date of Birth: {{Auth::user()->dob}}</li>
            </ul>
         </div>
         <div class="col-md-6">
                  @if(Session::has('ok'))
                    <div class="alert alert-success">
                      <p class="text-center"><strong>{{Session::get('ok')}}!!!</strong></p>
                    </div>
                  @endif
                   @if(Session::has('no'))
                    <div class="alert alert-danger">
                      <p class="text-center"><strong>{{Session::get('no')}}!!!</strong></p>
                    </div>
                  @endif
          <h3 class="text-center">Edit Profile</h3>
           <form action="{{route('admin_profile_check')}}" method="POST">
              <div class="form-group">
               <label>Contact</label>
               <input type="number" name="contact" class="form-control" required="" value="{{Auth::user()->contact}}">
             </div>
             <div class="form-group">
               <label>Email</label>
               <input type="email" name="email" class="form-control" required="" value="{{Auth::user()->email}}">
             </div>
             <div class="form-group">
               <label>Address</label>
               <textarea name="address" class="form-control" required="">{{Auth::user()->address}}</textarea>
             </div>
              {{csrf_field()}}
             <button type="submit" class="btn btn-primary btn-block">UPDATE</button>
           </form>
         </div>
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
