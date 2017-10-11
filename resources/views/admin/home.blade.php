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

            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <p class="pull-left"><span class="glyphicon glyphicon-volume-up"></span></p>
                      <h1>{{$req}}</h1>
                      <h2>Requests</h2>
                    </div>
                    <div class="panel-body">
                      <h3>Pending : {{$req_pend}}</h3>
                      <h3>Approved : {{$req_app}}</h3>
                    </div>
                  </div>
                </div>

               

               <div class="col-md-3">
                  <div class="panel panel-warning">
                    <div class="panel-heading">
                      <p class="pull-left"><span class="glyphicon glyphicon-folder-open"></span></p>
                      <h1>{{$blotter}}</h1>
                      <h2>Blotter</h2>
                    </div>
                    <div class="panel-body">
                      <h3>Pending : {{$blot_pen}}</h3>
                      <h3>Approved : {{$blot_app}}</h3>
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="panel panel-danger">
                    <div class="panel-heading">
                      <p class="pull-left"><span class="glyphicon glyphicon-file"></span></p>
                      <h1>{{$mis}}</h1>
                      <h2>Missing</h2>
                    </div>
                    <div class="panel-body">
                      <h3>Pending : {{$mis_pend}}</h3>
                      <h3>Approved : {{$mis_app}}</h3>
                      <h3>Found : {{$mis_found}}</h3>
                    </div>
                  </div>
                </div>

                 <div class="col-md-3">
                  <div class="panel panel-success">
                    <div class="panel-heading">
                      <p class="pull-left"><span class="glyphicon glyphicon-user"></span></p>
                      <h1>{{$user_c}}</h1>
                      <h2>Users</h2>
                    </div>
                    <div class="panel-body">
                      
                    </div>
                  </div>
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
